import React from "react";
import ReactDOM from "react-dom";
import App from "./App";

document.addEventListener("DOMContentLoaded", function () {
  const container = document.getElementById("wp-react-dashboard-widget");
  if (container) {
    ReactDOM.render(<App />, container);
  }
});
