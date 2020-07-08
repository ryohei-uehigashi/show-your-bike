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
  // $(".parent").append("<input type='file' id=images.id name='image' class='form-control-file image mb-2 added'>");

  // 要素追加
  let input = document.creatElement("input");
  input.setAttribute('type', 'file');
  input.setAttribute('name', 'image');
  input.setAttribute('class', 'form-control-file image added');
  input.setAttribute('id', images.id);
  input.appendChild(input);

  // 追加された要素を数える
  let count = $(".parent .added").length;
  // 追加されたinputが2つ以上なら追加ボタン無効
  if (count >= 2) {
    $("#add").prop("disabled", true);
  }
});



// 減らす
$(document).on("click", ".del", function del(event) {
    // ボタンの送信機能を適用させない
    event.preventDefault();

    // 削除
    // 追加されたinputだけ消す
    let parent = document.getElementsByClassName("parent");
    let added = document.getElementsByClassName("added");
    document.remove(added);

    // 親要素ごと(フォーム丸ごと)消してしまう
    // var target = $(this).parent();
    // if (target.parent().children().length > 1) {
    //     target.remove();
    // }

});