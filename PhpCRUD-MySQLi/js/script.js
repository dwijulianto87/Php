const container = document.getElementById("container");
const keyword = document.getElementById("keyword");
const animasi = document.getElementById("img-loading");

keyword.addEventListener('keyup', function(){
    animasi.style.display = 'inline';
    fetch(`mahasiswa.php?keyword=${keyword.value}`)
    .then(response => response.text())
    .then(response => {
        container.innerHTML= response;
        animasi.style.display = 'none';
    });
    
})