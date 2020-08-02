// 初回読み込み時にボタンの状態を変更
changeButton();

// 追加
$(document).on("click", ".add", function add(event) {
  // ボタンの送信機能を適用させない
  event.preventDefault();


  // 画像フォームの親要素を取得
  let parent = document.getElementById("parent");

  // 追加された要素を数える
  let count = parent.childElementCount;
  // 現在の要素の数＋1
  count++;

  // <input>追加、要素指定
  let input = document.createElement("input");
  input.setAttribute('type', 'file');
  input.setAttribute('class', 'form-control-file image mb-2');
  input.setAttribute('name', `image${count}`);
  input.setAttribute('onChange', `imgPreview(event, 'preview${count}')`)

  // 親要素の末尾に<input>追加
  parent.appendChild(input);

  // ボタンの有効、無効
  changeButton();

  // プレビュー
  // プレビュー用のdivタグ作成
  let preview = document = document.createElement("div");
  preview.setAttribute("id", `preview${count}`);

  // inputタグをプレビュータグまとめるdiv
  let inputGroup = document.createElement("div");
  
  //親要素の末尾にinputGroupタグ追加
  parent.appendChild(inputGroup);
  parent.lastChild.appendChild(input);
  parent.lastChild.appendChild(preview);
});



// 減らす
$(document).on("click", ".del", function del(event) {
    // ボタンの送信機能を適用させない
    event.preventDefault();

    // 親要素取得
    let parent = document.getElementById("parent");
    // 最後の要素を削除
    let lastChild = parent.lastElementChild.remove();
    // 子要素の数を取得
    let count = parent.childElementCount;

    // ボタンの有効、無効
    changeButton();
});



// 初回読み込み、追加、削除のボタンの有効、無効
function changeButton() {
  // 画像フォームの親要素取得
  let parent = document.getElementById("parent");
  // 画像フォームの数
  let count = parent.childElementCount;

  // diasbled = false (ボタン有効)にする
  $("#add").prop("disabled", false);
  $("#del").prop("disabled", false);

  // inputが3つ以上の時,追加ボタンを無効にする
  if (count >= 3) {
    $("#add").prop("disabled", true);
  }
  // inputが1つの時は、削除ボタンを無効
  if (count == 1) {
    $("#del").prop("disabled", true);
  }

}



// プレビュー
function imgPreview(event, id) {
  let file = event.target.files[0];
  let reader = new FileReader();
  let preview = document.getElementById(id);

  // すでにプレビューがある場合
  if (preview.lastElementChild) {
    // 子要素削除
    preview.lastElementChild.remove();
  }

  // 子要素追加
  reader.onload = function(event) {
    let img = document.createElement("img");
    img.setAttribute("src", reader.result);
    preview.appendChild(img);
  };
  reader.readAsDataURL(file);
};