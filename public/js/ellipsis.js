const opinion = document.getElementsByClassName("opinion");
const opinionArray = Array.from(opinion);
for (let i = 0; i < opinionArray.length; i++) {
  const array = opinion[i].innerText.split("");
  const char = array.length;
  if (char >= 25) {
    let text = opinion[i].innerText;
    text = text.substr(0, 24);
    opinion[i].innerText = text + "...";
  }
}