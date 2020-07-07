// 追加
$(document).on("click", ".add", function add(event) {
  // ボタンの送信機能を適用させない
  event.preventDefault();

  // 画像フォーム親、子要素の属性値取得
  let parent = document.getElementByClassName("parent");
  let images = document.getElementsByClassName("image");

  // id番号
  let idNo = 2;
  images.id = "image"+idNo;
  idNo++;

  // 追加
  let input = document.creatEarement("input");
  input.setAttribute("type", "file");
  input.setAttribute("name", "image");
  input.setAttribute("class", "form-control-file image");
  document.body.appendChild(input);
});

// 減らす
$(document).on("click", ".del", function del(event) {
    // ボタンの送信機能を適用させない
    event.preventDefault();

    var target = $(this).parent();
    if (target.parent().children().length > 1) {
        target.remove();
    }

});