function onAvatarSelected() {
  newAvatarInfo = "";
  isDisableUpdate = true;
  avatar = document.getElementById("avatar");
  if (avatar && avatar.value) {
    newAvatarInfo = `File ${avatar.value} selected. <b>Click button to update!</b>`;
    isDisableUpdate = false;
  }
  document.getElementById("new-avt-info").innerHTML = newAvatarInfo;
  document.getElementById("update").disabled = isDisableUpdate;

}
