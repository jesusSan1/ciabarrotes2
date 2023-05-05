Zoomerang.config({
  maxHeight: 400,
  maxWidth: 400,
  bgColor: "#000",
  bgOpacity: 0.85,
  onOpen: openCallback,
  onClose: closeCallback,
  onBeforeOpen: beforeOpenCallback,
  onBeforeClose: beforeCloseCallback,
}).listen(".imagen");

function openCallback(el) {}

function closeCallback(el) {}

function beforeOpenCallback(el) {}

function beforeCloseCallback(el) {}
