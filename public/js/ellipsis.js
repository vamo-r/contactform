const opinion = document.getElementsByClassName("opinion");
const array = opinion[1].innerText.split("");
const char = array.length;
if (char >= 25) {
  let text = opinion[1].innerText;
  text = text.substr(0, 24);
  opinion[1].innerText = text + "...";
}