var messagebox = document.getElementById("messagebox");
var username = document.getElementById("username");
var chatcontainer = document.getElementById("chatcontainer");
var conn;

username.addEventListener('keypress', function(evt) {
    if (evt.keyCode != 13 || this.value == "")
        return;

    evt.preventDefault();

    var name = this.value;
    this.style.display = "none";
    chatcontainer.style.display = "block";

    conn = new Connection(name, "chatwindow", "103.221.221.230:2518");
    //112.78.2.149
});

messagebox.addEventListener('keypress', function(evt) {
    if (evt.keyCode != 13 || conn == undefined)
        return;

    evt.preventDefault();

    if (this.value == "")
        return;

    conn.sendMsg(this.value);

    this.value = "";
});
