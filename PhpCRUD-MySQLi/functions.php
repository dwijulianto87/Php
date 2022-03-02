
<?php

// mysqli_fetch_row() // return 1 index(numerik)
// mysqli_fetch_assoc() // return 1 index(associative)
// mysqli_fetch_array() // return 1 index(numerik dan associative)
// mysqli_fetch_object() //


// koneksi ke database .................................
$conn = mysqli_connect("localhost", "root", "", "phpdasar_database");


// menampilkan seluruh data .............................
function query($query){
    global $conn ;
    // get data by table mahasiswa database phpdasar
    $result = mysqli_query($conn, $query);
    $mahasiswa =[];
    while ( $mhs = mysqli_fetch_assoc($result)){
        $mahasiswa[] = $mhs;
    }

    return $mahasiswa;
}

//  menambahkan data .....................................
function insert($data){
global $conn ;

$nama = htmlspecialchars($data['nama']);
$nrp = htmlspecialchars($data['nrp']);
$email = htmlspecialchars($data['email']);
$jurusan = htmlspecialchars($data['jurusan']);
    

$gambar = upload();

if(!$gambar){
    return false;
}

mysqli_query($conn, "INSERT INTO mahasiswa 
            VALUES('',
             '$nama', 
             '$nrp', 
             '$email', 
             '$jurusan', 
             '$gambar'
             )");


return mysqli_affected_rows($conn);

}


// hapus data ..............................................
function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function getItem($id){
    global $conn;
    $mahasiswa = query("SELECT * FROM mahasiswa");
    $item=[];
    foreach( $mahasiswa as $mhs){
        if($mhs['id'] == $id){
            $item = $mhs;
        }
    }
    return $item;
}

function ubah($data){
    global $conn ;

    $id = htmlspecialchars($data['id']);
    $nama = htmlspecialchars($data['nama']);
    $nrp = htmlspecialchars($data['nrp']);
    $email = htmlspecialchars($data['email']);
    $jurusan = htmlspecialchars($data['jurusan']);

    $gambarLama = htmlspecialchars($data['gambarLama']);

    // cek gambar
    if($_FILES['gambar']['error'] === 4){
        $gambar = $gambarLama;
    }else{
        $gambar = upload();
    }

    mysqli_query($conn, "UPDATE mahasiswa SET 
                nrp = '$nrp', 
                nama = '$nama', 
                email = '$email', 
                gambar = '$gambar', 
                jurusan = '$jurusan' 
                WHERE id = $id
                ");

    return mysqli_affected_rows($conn);
}

function cari($keyword){
    global $conn;
    // berdasarkan nama
    // LIKE '%$keyword% ( .... keyword ....)
    $mhs = query("SELECT * FROM mahasiswa 
                    WHERE 
                nama LIKE '%$keyword%' OR
                nrp LIKE '%$keyword%' OR
                email LIKE '%$keyword%' OR
                jurusan LIKE '%$keyword%'
                ");
    
    if(count($mhs) > 0){
        return $mhs;
    }
    return mysqli_affected_rows($conn);

}

function upload(){
    $file = $_FILES['gambar'];
    $namaFile = $file['name'];
    $sizeFile = $file['size'];
    $errorFile = $file['error'];
    $isFile = $file['tmp_name'];



    
    // // cek apakah ada gambar yang diupload
    if( $errorFile === 4 ){
        echo "<script>
                    alert('silahkan pilih gambar !');
                </script>";

        return false;
    }

    // cek apakah yang diupload file gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid) ){
        echo "<script>
                    alert('silahkan pilih gambar jpg/jpeg/png !');
                </script>";

        return false;
    }

    // cek batas maksimal ukuran gambar
    if($sizeFile > 2000000){
        echo "<script>
                    alert('ukuran gambar terlalu besar !');
                </script>";

        return false;
    }

    // lolos pengecekan
    $namaFile = uniqid().".".$ekstensiGambar;
    
    move_uploaded_file($isFile, "img/".$namaFile);
    return $namaFile;
}


function cekUserName($username){
    global $conn;
    
    $user = mysqli_query($conn, "SELECT * FROM user 
                    WHERE 
                username = '$username'
                ");

    return mysqli_fetch_assoc($user);
}

//  registrasi
function registrasi($data){
    global $conn;
    $userName = strtolower(stripslashes($data["userName"]));
    $password = mysqli_real_escape_string($conn, $data['password']);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // username sudah ada atau belum
    if(cekUserName($userName) !== null){
        echo "<script>
                alert('username sudah ada !');
            </script>";
        return false;
    }

    // cek konfirmasi password

    if($password !== $password2){
        echo "<script>
                alert('password tidak sesuai');
            </script>";
        
        return false;
    }

    // enkripsi password (password_hash)
    $password = password_hash($password, PASSWORD_DEFAULT);

    // insert ke tabel user
    mysqli_query($conn, "INSERT INTO user 
                VALUES
    ('', '$userName', '$password' )");

    return mysqli_affected_rows($conn);
}


?>