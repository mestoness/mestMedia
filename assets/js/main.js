var en_son = "";
$("#add_post_form").submit(function (event) {
  event.preventDefault();

  var editorValue = $("#content")
    .val()
    .replace(/(https?:\/\/[^ ]*)/g, '<a href="$1" target="_blank">$1</a>');
  var satırlı = editorValue.split("\n").filter(function (e) {
    return e.replace(/(\r\n|\n|\r)/gm, "");
  });
  for (let i = 0; i < satırlı.length; i++) {
    if (satırlı.length == 1) {
      en_son += satırlı[i];
    } else {
      en_son += satırlı[i] + "<br>";
    }
    if (i === satırlı.length - 1) {
      $("#content_").val(en_son);
      $("#content").val("");
      $(this).unbind("submit").submit();
    }
  }
});
