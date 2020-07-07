// 追加
$(document).on("click", ".add", function add(event) {
  // ボタンの送信機能を適用させない
  event.preventDefault();

  // 画像フォーム親、子要素の属性値取得
  let parent = document.getElementsByClassName("parent");
  let images = document.getElementsByClassName("image");

  // id番号
  let idNo = 2;
  images.id = "image"+idNo;
  idNo++;

  // 追加
  $(".parent").append("<input type='file' id='images.id' name='image' class='form-control-file image'>");

  // 追加
  // let input = document.creatElement("input");
  // input.setAttribute("type", "file");
  // input.setAttribute("name", "image");
  // input.setAttribute("class", "form-control-file image");
  // input.setAttribute("id", images.id);
  // input.appendChild(input);
});


// 減らす
$(document).on("click", ".del", function del(event) {
    // ボタンの送信機能を適用させない
    event.preventDefault();

    // 削除
    
    // 親要素ごと消してしまう
    // var target = $(this).parent();
    // if (target.parent().children().length > 1) {
    //     target.remove();
    // }

});