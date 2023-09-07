var fileInput = document.getElementById("custom-file");
var fileStatus = document.querySelector(".file-status");

fileInput.addEventListener('change',function(){
    fileStatus.textContent = this.files[0].name;
})

const defaultFile='bx bxs-cloud-upload icon'
const file = document.getElementById('custom-file');
const img = document.getElementById('img')
file.addEventListener('change', e =>{
    if(e.target.files[0]){
        img.src='https://cdn-icons-png.flaticon.com/512/1198/1198293.png';
    }
    else{
        img.src = defaultFile;
    }
});