const bg=document.getElementById(#login-card);
const btn=document.getElementById(#btn);

var bgArr=["bg1.jpg","bg2.jpg","bg3.jpg"];

btn.addEventListener("click",changeColor);

function changeColor(){
	let random= Math.floor(Math.random()*bgArr.Length)
	bg.style.backgroundColor=bgArr[random];
}