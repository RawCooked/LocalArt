const msgerForm = get(".msger-inputarea");
const msgerInput = get(".msger-input");
const msgerChat = get(".msger-chat");

const ARTIST_IMG = "https://image.flaticon.com/icons/svg/327/327779.svg";
const CLIENT_IMG = "https://image.flaticon.com/icons/svg/145/145867.svg";
const ARTIST_NAME = "ARTIST";//idart-->artname
const CLIENT_NAME = "Sajad";//idcl-->clientname

msgerForm.addEventListener("submit", event => {
    event.preventDefault();
  
    const msgText = msgerInput.value;
    if (!msgText) return;
  
    appendMessage(CLIENT_NAME, CLIENT_IMG, "right", msgText);
    msgerInput.value = "";
  });

  function appendMessage(name, img, side, text) {
    date=formatDate(new Date());
    const msgHTML = `
      <div class="msg ${side}-msg">
        <div class="msg-img" style="background-image: url(${img})"></div>
  
        <div class="msg-bubble">
          <div class="msg-info">
            <div class="msg-info-name">${name}</div>
            <div class="msg-info-time">${date}</div>
          </div>
  
          <div class="msg-text">${text}</div>
        </div>
      </div>
    `;
  
    msgerChat.insertAdjacentHTML("beforeend", msgHTML);
    msgerChat.scrollTop += 500;    
  }
  function ARTISTResponse(sender,text){
    appendMessage(ARTIST_NAME, ARTIST_IMG, "left", text);
  }
  function get(selector, root = document) {
    return root.querySelector(selector);
  }
  function formatDate(date) {
    const h = "0" + date.getHours();
    const m = "0" + date.getMinutes();
  
    return `${h.slice(-2)}:${m.slice(-2)}`;
  }
  function random(min, max) {
    return Math.floor(Math.random() * (max - min) + min);
  }