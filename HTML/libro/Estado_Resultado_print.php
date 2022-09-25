<?php 

session_start();

$_SESSION['id'];
$_SESSION['cliente'];
$_SESSION['fechai'];
$_SESSION['fechaf'];

?>
<!DOCTYPE html>
<html lang="en" >
<head>
<title>Estado de Resultado</title>
<meta name="viewport" content="width=device-width, initial-scale=1"><link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css'>  
</head>
<body>
  <style>
    .ui-helper-hidden {
  display: none;
}

.ui-helper-hidden-accessible {
  position: absolute !important;
  clip: rect(1px,1px,1px,1px);
}

.ui-helper-reset {
  margin: 0;
  padding: 0;
  border: 0;
  outline: 0;
  line-height: 1.3;
  text-decoration: none;
  font-size: 100%;
  list-style: none;
}

.ui-helper-clearfix:before,.ui-helper-clearfix:after {
  content: "";
  display: table;
}

.ui-helper-clearfix:after {
  clear: both;
}

.ui-helper-clearfix {
  zoom: 1;
}

.ui-helper-zfix {
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  position: absolute;
  opacity: 0;
  filter: Alpha(Opacity=0);
}

.ui-state-disabled {
  cursor: default !important;
}

.ui-icon {
  display: block;
  text-indent: -99999px;
  overflow: hidden;
  background-repeat: no-repeat;
}

.ui-widget-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}

.ui-widget {
  font-family: Arial,sans-serif;
  font-size: 1.1em;
}

.ui-widget .ui-widget {
  font-size: 1em;
}

.ui-widget input,.ui-widget select,.ui-widget textarea {
  font-family: Arial,sans-serif;
  font-size: 1em;
}

.ui-widget-content {
  border: 1px solid #eee;
  background: #fff url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/ui-bg_flat_75_ffffff_40x100.png) 50% 50% repeat-x;
  color: #333;
}

.ui-widget-content a {
  color: #333;
}

.ui-widget-header {
  border: 1px solid #e3a1a1;
  background: #c00 url(http://it.app.creditsafe.com/Staged/ItalyWebsihttp://it.app.creditsafe.com/Staged/ItalyWebsite/Images/ui-bg_highlight-soft_15_cc0000_1x100.png) 50% 50% repeat-x;
  color: #fff;
  font-weight: 700;
}

.ui-widget-header a {
  color: #fff;
}

.ui-widget button {
  position: relative;
}

.ui-state-default,.ui-widget-content .ui-state-default,.ui-widget-header .ui-state-default {
  border: 1px solid #d8dcdf;
  background: #eee url(http://it.app.creditsafe.com/Staged/ItalyWebsihttp://it.app.creditsafe.com/Staged/ItalyWebsite/Images/ui-bg_highlight-hard_100_eeeeee_1x100.png) 50% 50% repeat-x;
  font-weight: 700;
  color: #004276;
}

.ui-state-default a,.ui-state-default a:link,.ui-state-default a:visited {
  color: #004276;
  text-decoration: none;
}

.ui-state-hover,.ui-widget-content .ui-state-hover,.ui-widget-header .ui-state-hover,.ui-state-focus,.ui-widget-content .ui-state-focus,.ui-widget-header .ui-state-focus {
}

.ui-state-hover a,.ui-state-hover a:hover {
  color: #111;
  text-decoration: none;
}

.ui-state-active,.ui-widget-content .ui-state-active,.ui-widget-header .ui-state-active {
}

.ui-state-active a,.ui-state-active a:link,.ui-state-active a:visited {
  color: #c00;
  text-decoration: none;
}

.ui-widget :active {
  outline: none;
}

.ui-state-highlight,.ui-widget-content .ui-state-highlight,.ui-widget-header .ui-state-highlight {
  border: 1px solid #fcd3a1;
  background: #fbf8ee url(http://it.app.creditsafe.com/Staged/ItalyWebsihttp://it.app.creditsafe.com/Staged/ItalyWebsite/Images/ui-bg_glass_55_fbf8ee_1x400.png) 50% 50% repeat-x;
  color: #444;
}

.ui-state-highlight a,.ui-widget-content .ui-state-highlight a,.ui-widget-header .ui-state-highlight a {
  color: #444;
}

.ui-state-error,.ui-widget-content .ui-state-error,.ui-widget-header .ui-state-error {
  border: 1px solid #c00;
  background: #f3d8d8 url(http://it.app.creditsafe.com/Staged/ItalyWebsihttp://it.app.creditsafe.com/Staged/ItalyWebsite/Images/ui-bg_diagonals-thick_75_f3d8d8_40x40.png) 50% 50% repeat;
  color: #2e2e2e;
}

.ui-state-error a,.ui-widget-content .ui-state-error a,.ui-widget-header .ui-state-error a {
  color: #2e2e2e;
}

.ui-state-error-text,.ui-widget-content .ui-state-error-text,.ui-widget-header .ui-state-error-text {
  color: #2e2e2e;
}

.ui-priority-primary,.ui-widget-content .ui-priority-primary,.ui-widget-header .ui-priority-primary {
  font-weight: 700;
}

.ui-priority-secondary,.ui-widget-content .ui-priority-secondary,.ui-widget-header .ui-priority-secondary {
  opacity: .7;
  filter: Alpha(Opacity=70);
  font-weight: 400;
}

.ui-state-disabled,.ui-widget-content .ui-state-disabled,.ui-widget-header .ui-state-disabled {
  opacity: .35;
  filter: Alpha(Opacity=35);
  background-image: none;
}

.ui-icon {
  width: 16px;
  height: 16px;
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsihttp://it.app.creditsafe.com/Staged/ItalyWebsite/Images/ui-icons_cc0000_256x240.png);
}

.ui-widget-content .ui-icon {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsihttp://it.app.creditsafe.com/Staged/ItalyWebsite/Images/ui-icons_cc0000_256x240.png);
}

.ui-widget-header .ui-icon {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsihttp://it.app.creditsafe.com/Staged/ItalyWebsite/Images/ui-icons_ffffff_256x240.png);
}

.ui-state-default .ui-icon {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/ui-icons_cc0000_256x240.png);
}

.ui-state-active .ui-icon {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/ui-icons_cc0000_256x240.png);
}

.ui-state-highlight .ui-icon {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/ui-icons_004276_256x240.png);
}

.ui-state-error .ui-icon,.ui-state-error-text .ui-icon {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/ui-icons_cc0000_256x240.png);
}

.ui-icon-carat-1-n {
  background-position: 0 0;
}

.ui-icon-carat-1-ne {
  background-position: -16px 0;
}

.ui-icon-carat-1-e {
  background-position: -32px 0;
}

.ui-icon-carat-1-se {
  background-position: -48px 0;
}

.ui-icon-carat-1-s {
  background-position: -64px 0;
}

.ui-icon-carat-1-sw {
  background-position: -80px 0;
}

.ui-icon-carat-1-w {
  background-position: -96px 0;
}

.ui-icon-carat-1-nw {
  background-position: -112px 0;
}

.ui-icon-carat-2-n-s {
  background-position: -128px 0;
}

.ui-icon-carat-2-e-w {
  background-position: -144px 0;
}

.ui-icon-triangle-1-n {
  background-position: 0 -16px;
}

.ui-icon-triangle-1-ne {
  background-position: -16px -16px;
}

.ui-icon-triangle-1-e {
  background-position: -32px -16px;
}

.ui-icon-triangle-1-se {
  background-position: -48px -16px;
}

.ui-icon-triangle-1-s {
  background-position: -64px -16px;
}

.ui-icon-triangle-1-sw {
  background-position: -80px -16px;
}

.ui-icon-triangle-1-w {
  background-position: -96px -16px;
}

.ui-icon-triangle-1-nw {
  background-position: -112px -16px;
}

.ui-icon-triangle-2-n-s {
  background-position: -128px -16px;
}

.ui-icon-triangle-2-e-w {
  background-position: -144px -16px;
}

.ui-icon-arrow-1-n {
  background-position: 0 -32px;
}

.ui-icon-arrow-1-ne {
  background-position: -16px -32px;
}

.ui-icon-arrow-1-e {
  background-position: -32px -32px;
}

.ui-icon-arrow-1-se {
  background-position: -48px -32px;
}

.ui-icon-arrow-1-s {
  background-position: -64px -32px;
}

.ui-icon-arrow-1-sw {
  background-position: -80px -32px;
}

.ui-icon-arrow-1-w {
  background-position: -96px -32px;
}

.ui-icon-arrow-1-nw {
  background-position: -112px -32px;
}

.ui-icon-arrow-2-n-s {
  background-position: -128px -32px;
}

.ui-icon-arrow-2-ne-sw {
  background-position: -144px -32px;
}

.ui-icon-arrow-2-e-w {
  background-position: -160px -32px;
}

.ui-icon-arrow-2-se-nw {
  background-position: -176px -32px;
}

.ui-icon-arrowstop-1-n {
  background-position: -192px -32px;
}

.ui-icon-arrowstop-1-e {
  background-position: -208px -32px;
}

.ui-icon-arrowstop-1-s {
  background-position: -224px -32px;
}

.ui-icon-arrowstop-1-w {
  background-position: -240px -32px;
}

.ui-icon-arrowthick-1-n {
  background-position: 0 -48px;
}

.ui-icon-arrowthick-1-ne {
  background-position: -16px -48px;
}

.ui-icon-arrowthick-1-e {
  background-position: -32px -48px;
}

.ui-icon-arrowthick-1-se {
  background-position: -48px -48px;
}

.ui-icon-arrowthick-1-s {
  background-position: -64px -48px;
}

.ui-icon-arrowthick-1-sw {
  background-position: -80px -48px;
}

.ui-icon-arrowthick-1-w {
  background-position: -96px -48px;
}

.ui-icon-arrowthick-1-nw {
  background-position: -112px -48px;
}

.ui-icon-arrowthick-2-n-s {
  background-position: -128px -48px;
}

.ui-icon-arrowthick-2-ne-sw {
  background-position: -144px -48px;
}

.ui-icon-arrowthick-2-e-w {
  background-position: -160px -48px;
}

.ui-icon-arrowthick-2-se-nw {
  background-position: -176px -48px;
}

.ui-icon-arrowthickstop-1-n {
  background-position: -192px -48px;
}

.ui-icon-arrowthickstop-1-e {
  background-position: -208px -48px;
}

.ui-icon-arrowthickstop-1-s {
  background-position: -224px -48px;
}

.ui-icon-arrowthickstop-1-w {
  background-position: -240px -48px;
}

.ui-icon-arrowreturnthick-1-w {
  background-position: 0 -64px;
}

.ui-icon-arrowreturnthick-1-n {
  background-position: -16px -64px;
}

.ui-icon-arrowreturnthick-1-e {
  background-position: -32px -64px;
}

.ui-icon-arrowreturnthick-1-s {
  background-position: -48px -64px;
}

.ui-icon-arrowreturn-1-w {
  background-position: -64px -64px;
}

.ui-icon-arrowreturn-1-n {
  background-position: -80px -64px;
}

.ui-icon-arrowreturn-1-e {
  background-position: -96px -64px;
}

.ui-icon-arrowreturn-1-s {
  background-position: -112px -64px;
}

.ui-icon-arrowrefresh-1-w {
  background-position: -128px -64px;
}

.ui-icon-arrowrefresh-1-n {
  background-position: -144px -64px;
}

.ui-icon-arrowrefresh-1-e {
  background-position: -160px -64px;
}

.ui-icon-arrowrefresh-1-s {
  background-position: -176px -64px;
}

.ui-icon-arrow-4 {
  background-position: 0 -80px;
}

.ui-icon-arrow-4-diag {
  background-position: -16px -80px;
}

.ui-icon-extlink {
  background-position: -32px -80px;
}

.ui-icon-newwin {
  background-position: -48px -80px;
}

.ui-icon-refresh {
  background-position: -64px -80px;
}

.ui-icon-shuffle {
  background-position: -80px -80px;
}

.ui-icon-transfer-e-w {
  background-position: -96px -80px;
}

.ui-icon-transferthick-e-w {
  background-position: -112px -80px;
}

.ui-icon-folder-collapsed {
  background-position: 0 -96px;
}

.ui-icon-folder-open {
  background-position: -16px -96px;
}

.ui-icon-document {
  background-position: -32px -96px;
}

.ui-icon-document-b {
  background-position: -48px -96px;
}

.ui-icon-note {
  background-position: -64px -96px;
}

.ui-icon-mail-closed {
  background-position: -80px -96px;
}

.ui-icon-mail-open {
  background-position: -96px -96px;
}

.ui-icon-suitcase {
  background-position: -112px -96px;
}

.ui-icon-comment {
  background-position: -128px -96px;
}

.ui-icon-person {
  background-position: -144px -96px;
}

.ui-icon-print {
  background-position: -160px -96px;
}

.ui-icon-trash {
  background-position: -176px -96px;
}

.ui-icon-locked {
  background-position: -192px -96px;
}

.ui-icon-unlocked {
  background-position: -208px -96px;
}

.ui-icon-bookmark {
  background-position: -224px -96px;
}

.ui-icon-tag {
  background-position: -240px -96px;
}

.ui-icon-home {
  background-position: 0 -112px;
}

.ui-icon-flag {
  background-position: -16px -112px;
}

.ui-icon-calendar {
  background-position: -32px -112px;
}

.ui-icon-cart {
  background-position: -48px -112px;
}

.ui-icon-pencil {
  background-position: -64px -112px;
}

.ui-icon-clock {
  background-position: -80px -112px;
}

.ui-icon-disk {
  background-position: -96px -112px;
}

.ui-icon-calculator {
  background-position: -112px -112px;
}

.ui-icon-zoomin {
  background-position: -128px -112px;
}

.ui-icon-zoomout {
  background-position: -144px -112px;
}

.ui-icon-search {
  background-position: -160px -112px;
}

.ui-icon-wrench {
  background-position: -176px -112px;
}

.ui-icon-gear {
  background-position: -192px -112px;
}

.ui-icon-heart {
  background-position: -208px -112px;
}

.ui-icon-star {
  background-position: -224px -112px;
}

.ui-icon-link {
  background-position: -240px -112px;
}

.ui-icon-cancel {
  background-position: 0 -128px;
}

.ui-icon-plus {
  background-position: -16px -128px;
}

.ui-icon-plusthick {
  background-position: -32px -128px;
}

.ui-icon-minus {
  background-position: -48px -128px;
}

.ui-icon-minusthick {
  background-position: -64px -128px;
}

.ui-icon-close {
  background-position: -80px -128px;
}

.ui-icon-closethick {
  background-position: -96px -128px;
}

.ui-icon-key {
  background-position: -112px -128px;
}

.ui-icon-lightbulb {
  background-position: -128px -128px;
}

.ui-icon-scissors {
  background-position: -144px -128px;
}

.ui-icon-clipboard {
  background-position: -160px -128px;
}

.ui-icon-copy {
  background-position: -176px -128px;
}

.ui-icon-contact {
  background-position: -192px -128px;
}

.ui-icon-image {
  background-position: -208px -128px;
}

.ui-icon-video {
  background-position: -224px -128px;
}

.ui-icon-script {
  background-position: -240px -128px;
}

.ui-icon-alert {
  background-position: 0 -144px;
}

.ui-icon-info {
  background-position: -16px -144px;
}

.ui-icon-notice {
  background-position: -32px -144px;
}

.ui-icon-help {
  background-position: -48px -144px;
}

.ui-icon-check {
  background-position: -64px -144px;
}

.ui-icon-bullet {
  background-position: -80px -144px;
}

.ui-icon-radio-off {
  background-position: -96px -144px;
}

.ui-icon-radio-on {
  background-position: -112px -144px;
}

.ui-icon-pin-w {
  background-position: -128px -144px;
}

.ui-icon-pin-s {
  background-position: -144px -144px;
}

.ui-icon-play {
  background-position: 0 -160px;
}

.ui-icon-pause {
  background-position: -16px -160px;
}

.ui-icon-seek-next {
  background-position: -32px -160px;
}

.ui-icon-seek-prev {
  background-position: -48px -160px;
}

.ui-icon-seek-end {
  background-position: -64px -160px;
}

.ui-icon-seek-start {
  background-position: -80px -160px;
}

.ui-icon-seek-first {
  background-position: -80px -160px;
}

.ui-icon-stop {
  background-position: -96px -160px;
}

.ui-icon-eject {
  background-position: -112px -160px;
}

.ui-icon-volume-off {
  background-position: -128px -160px;
}

.ui-icon-volume-on {
  background-position: -144px -160px;
}

.ui-icon-power {
  background-position: 0 -176px;
}

.ui-icon-signal-diag {
  background-position: -16px -176px;
}

.ui-icon-signal {
  background-position: -32px -176px;
}

.ui-icon-battery-0 {
  background-position: -48px -176px;
}

.ui-icon-battery-1 {
  background-position: -64px -176px;
}

.ui-icon-battery-2 {
  background-position: -80px -176px;
}

.ui-icon-battery-3 {
  background-position: -96px -176px;
}

.ui-icon-circle-plus {
  background-position: 0 -192px;
}

.ui-icon-circle-minus {
  background-position: -16px -192px;
}

.ui-icon-circle-close {
  background-position: -32px -192px;
}

.ui-icon-circle-triangle-e {
  background-position: -48px -192px;
}

.ui-icon-circle-triangle-s {
  background-position: -64px -192px;
}

.ui-icon-circle-triangle-w {
  background-position: -80px -192px;
}

.ui-icon-circle-triangle-n {
  background-position: -96px -192px;
}

.ui-icon-circle-arrow-e {
  background-position: -112px -192px;
}

.ui-icon-circle-arrow-s {
  background-position: -128px -192px;
}

.ui-icon-circle-arrow-w {
  background-position: -144px -192px;
}

.ui-icon-circle-arrow-n {
  background-position: -160px -192px;
}

.ui-icon-circle-zoomin {
  background-position: -176px -192px;
}

.ui-icon-circle-zoomout {
  background-position: -192px -192px;
}

.ui-icon-circle-check {
  background-position: -208px -192px;
}

.ui-icon-circlesmall-plus {
  background-position: 0 -208px;
}

.ui-icon-circlesmall-minus {
  background-position: -16px -208px;
}

.ui-icon-circlesmall-close {
  background-position: -32px -208px;
}

.ui-icon-squaresmall-plus {
  background-position: -48px -208px;
}

.ui-icon-squaresmall-minus {
  background-position: -64px -208px;
}

.ui-icon-squaresmall-close {
  background-position: -80px -208px;
}

.ui-icon-grip-dotted-vertical {
  background-position: 0 -224px;
}

.ui-icon-grip-dotted-horizontal {
  background-position: -16px -224px;
}

.ui-icon-grip-solid-vertical {
  background-position: -32px -224px;
}

.ui-icon-grip-solid-horizontal {
  background-position: -48px -224px;
}

.ui-icon-gripsmall-diagonal-se {
  background-position: -64px -224px;
}

.ui-icon-grip-diagonal-se {
  background-position: -80px -224px;
}

.ui-corner-all,.ui-corner-top,.ui-corner-left,.ui-corner-tl {
  -moz-border-radius-topleft: 6px;
  -webkit-border-top-left-radius: 6px;
  -khtml-border-top-left-radius: 6px;
  border-top-left-radius: 6px;
}

.ui-corner-all,.ui-corner-top,.ui-corner-right,.ui-corner-tr {
  -moz-border-radius-topright: 6px;
  -webkit-border-top-right-radius: 6px;
  -khtml-border-top-right-radius: 6px;
  border-top-right-radius: 6px;
}

.ui-corner-all,.ui-corner-bottom,.ui-corner-left,.ui-corner-bl {
  -moz-border-radius-bottomleft: 6px;
  -webkit-border-bottom-left-radius: 6px;
  -khtml-border-bottom-left-radius: 6px;
  border-bottom-left-radius: 6px;
}

.ui-corner-all,.ui-corner-bottom,.ui-corner-right,.ui-corner-br {
  -moz-border-radius-bottomright: 6px;
  -webkit-border-bottom-right-radius: 6px;
  -khtml-border-bottom-right-radius: 6px;
  border-bottom-right-radius: 6px;
}

.ui-widget-overlay {
  background: #a6a6a6 url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/ui-bg_dots-small_65_a6a6a6_2x2.png) 50% 50% repeat;
  opacity: .4;
  filter: Alpha(Opacity=40);
}

.ui-widget-shadow {
  margin: -8px 0 0 -8px;
  padding: 8px;
  background: #333 url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/ui-bg_flat_0_333333_40x100.png) 50% 50% repeat-x;
  opacity: .1;
  filter: Alpha(Opacity=10);
  -moz-border-radius: 8px;
  -khtml-border-radius: 8px;
  -webkit-border-radius: 8px;
  border-radius: 8px;
}

.ui-autocomplete {
  position: absolute;
  cursor: default;
  background-color: #fff;
  max-height: 200px;
  width: auto;
  overflow-y: auto;
  overflow-x: hidden;
}

.ui-autocomplete-input {
  width: 108px;
}

* html .ui-autocomplete {
  width: 1px;
}

.ui-menu {
  list-style: none;
  padding: 0;
  margin: 0;
  display: block;
  float: left;
  border-style: ridge;
}

.ui-menu .ui-menu {
  margin-top: -3px;
}

.ui-menu .ui-menu-item {
  margin: 0;
  padding: 0;
  zoom: 1;
  float: left;
  clear: left;
  width: 100%;
}

.ui-menu .ui-menu-item a {
  text-decoration: none;
  color: #fff;
  display: block;
  padding: .2em .4em;
  line-height: 1.5;
  zoom: 1;
}

.ui-menu .ui-menu-item a.ui-state-hover,.ui-menu .ui-menu-item a.ui-state-active {
  font-weight: 400;
  margin: 0;
  background-color: Highlight;
}

.ui-button {
  display: inline-block;
  position: relative;
  padding: 0;
  margin-right: .1em;
  text-decoration: none !important;
  cursor: pointer;
  text-align: center;
  zoom: 1;
  overflow: visible;
  top: 5px;
}

.ui-button-icon-only {
  width: 1.5em;
}

.ui-button .ui-button-text {
  display: block;
}

.ui-button-text-only .ui-button-text {
  padding: .4em 1em;
}

.ui-button-icon-only .ui-button-text,.ui-button-icons-only .ui-button-text {
  padding: .4em;
  text-indent: -9999999px;
}

.ui-button-text-icon-primary .ui-button-text,.ui-button-text-icons .ui-button-text {
  padding: .4em 1em .4em 2.1em;
}

.ui-button-text-icon-secondary .ui-button-text,.ui-button-text-icons .ui-button-text {
  padding: .4em 2.1em .4em 1em;
}

.ui-button-text-icons .ui-button-text {
  padding-left: 2.1em;
  padding-right: 2.1em;
}

input.ui-button {
  padding-top: 0;
  padding-bottom: 0;
}

.ui-button-icon-only .ui-icon,.ui-button-text-icon-primary .ui-icon,.ui-button-text-icon-secondary .ui-icon,.ui-button-text-icons .ui-icon,.ui-button-icons-only .ui-icon {
  position: absolute;
  top: 50%;
  margin-top: -8px;
}

.ui-button-icon-only .ui-icon {
  left: 50%;
  margin-left: -8px;
}

.ui-button-text-icon-primary .ui-button-icon-primary,.ui-button-text-icons .ui-button-icon-primary,.ui-button-icons-only .ui-button-icon-primary {
  left: .5em;
}

.ui-button-text-icon-secondary .ui-button-icon-secondary,.ui-button-text-icons .ui-button-icon-secondary,.ui-button-icons-only .ui-button-icon-secondary {
  right: .5em;
}

.ui-button-text-icons .ui-button-icon-secondary,.ui-button-icons-only .ui-button-icon-secondary {
  right: .5em;
}

.ui-buttonset {
  margin-right: 7px;
}

.ui-buttonset .ui-button {
  margin-left: 0;
  margin-right: -.3em;
}

button.ui-button::-moz-focus-inner {
  border: 0;
  padding: 0;
}

.ui-dialog {
  position: absolute;
  padding: .2em;
  width: 780px;
  overflow: hidden;
}

.ui-dialog .ui-dialog-titlebar {
  padding: .4em 1em;
  position: relative;
}

.ui-dialog .ui-dialog-title {
  float: left;
  margin: .1em 16px .1em 0;
}

.ui-dialog .ui-dialog-titlebar-close {
  position: absolute;
  right: .3em;
  top: 50%;
  width: 19px;
  margin: -10px 0 0;
  padding: 1px;
  height: 18px;
}

.ui-dialog .ui-dialog-titlebar-close span {
  display: block;
  margin: 1px;
}

.ui-dialog .ui-dialog-titlebar-close:hover,.ui-dialog .ui-dialog-titlebar-close:focus {
  padding: 0;
}

.ui-dialog .ui-dialog-content {
  position: relative;
  border: 0;
  padding: .5em 1em;
  background: none;
  overflow: auto;
  zoom: 1;
}

.ui-dialog .ui-dialog-buttonpane {
  text-align: left;
  border-width: 1px 0 0;
  background-image: none;
  margin: .5em 0 0;
  padding: .3em 1em .5em .4em;
}

.ui-dialog .ui-dialog-buttonpane .ui-dialog-buttonset {
  float: right;
}

.ui-dialog .ui-dialog-buttonpane button {
  margin: .5em .4em .5em 0;
  cursor: pointer;
}

.ui-dialog .ui-resizable-se {
  width: 14px;
  height: 14px;
  right: 3px;
  bottom: 3px;
}

.ui-draggable .ui-dialog-titlebar {
  cursor: move;
}

.ui-datepicker {
  width: 17em;
  padding: .2em .2em 0;
  display: none;
}

.ui-datepicker .ui-datepicker-header {
  position: relative;
  padding: .2em 0;
}

.ui-datepicker .ui-datepicker-prev,.ui-datepicker .ui-datepicker-next {
  position: absolute;
  top: 2px;
  width: 1.8em;
  height: 1.8em;
}

.ui-datepicker .ui-datepicker-prev-hover,.ui-datepicker .ui-datepicker-next-hover {
  top: 1px;
}

.ui-datepicker .ui-datepicker-prev {
  left: 2px;
}

.ui-datepicker .ui-datepicker-next {
  right: 2px;
}

.ui-datepicker .ui-datepicker-prev-hover {
  left: 1px;
}

.ui-datepicker .ui-datepicker-next-hover {
  right: 1px;
}

.ui-datepicker .ui-datepicker-prev span,.ui-datepicker .ui-datepicker-next span {
  display: block;
  position: absolute;
  left: 50%;
  margin-left: -8px;
  top: 50%;
  margin-top: -8px;
}

.ui-datepicker .ui-datepicker-title {
  margin: 0 2.3em;
  line-height: 1.8em;
  text-align: center;
}

.ui-datepicker .ui-datepicker-title select {
  font-size: 1em;
  margin: 1px 0;
}

.ui-datepicker select.ui-datepicker-month-year {
  width: 100%;
}

.ui-datepicker select.ui-datepicker-month,.ui-datepicker select.ui-datepicker-year {
  width: 49%;
}

.ui-datepicker table {
  width: 100%;
  font-size: .9em;
  border-collapse: collapse;
  margin: 0 0 .4em;
}

.ui-datepicker th {
  padding: .7em .3em;
  text-align: center;
  font-weight: 700;
  border: 0;
}

.ui-datepicker td {
  border: 0;
  padding: 1px;
}

.ui-datepicker td span,.ui-datepicker td a {
  display: block;
  padding: .2em;
  text-align: right;
  text-decoration: none;
}

.ui-datepicker .ui-datepicker-buttonpane {
  background-image: none;
  margin: .7em 0 0;
  padding: 0 .2em;
  border-left: 0;
  border-right: 0;
  border-bottom: 0;
}

.ui-datepicker .ui-datepicker-buttonpane button {
  float: right;
  margin: .5em .2em .4em;
  cursor: pointer;
  padding: .2em .6em .3em;
  width: auto;
  overflow: visible;
}

.ui-datepicker .ui-datepicker-buttonpane button.ui-datepicker-current {
  float: left;
}

.ui-datepicker.ui-datepicker-multi {
  width: auto;
}

.ui-datepicker-multi .ui-datepicker-group {
  float: left;
}

.ui-datepicker-multi .ui-datepicker-group table {
  width: 95%;
  margin: 0 auto .4em;
}

.ui-datepicker-multi-2 .ui-datepicker-group {
  width: 50%;
}

.ui-datepicker-multi-3 .ui-datepicker-group {
  width: 33.3%;
}

.ui-datepicker-multi-4 .ui-datepicker-group {
  width: 25%;
}

.ui-datepicker-multi .ui-datepicker-group-last .ui-datepicker-header {
  border-left-width: 0;
}

.ui-datepicker-multi .ui-datepicker-group-middle .ui-datepicker-header {
  border-left-width: 0;
}

.ui-datepicker-multi .ui-datepicker-buttonpane {
  clear: left;
}

.ui-datepicker-row-break {
  clear: both;
  width: 100%;
  font-size: 0;
}

.ui-datepicker-rtl {
  direction: rtl;
}

.ui-datepicker-rtl .ui-datepicker-prev {
  right: 2px;
  left: auto;
}

.ui-datepicker-rtl .ui-datepicker-next {
  left: 2px;
  right: auto;
}

.ui-datepicker-rtl .ui-datepicker-prev:hover {
  right: 1px;
  left: auto;
}

.ui-datepicker-rtl .ui-datepicker-next:hover {
  left: 1px;
  right: auto;
}

.ui-datepicker-rtl .ui-datepicker-buttonpane {
  clear: right;
}

.ui-datepicker-rtl .ui-datepicker-buttonpane button {
  float: left;
}

.ui-datepicker-rtl .ui-datepicker-buttonpane button.ui-datepicker-current {
  float: right;
}

.ui-datepicker-rtl .ui-datepicker-group {
  float: right;
}

.ui-datepicker-rtl .ui-datepicker-group-last .ui-datepicker-header {
  border-right-width: 0;
  border-left-width: 1px;
}

.ui-datepicker-rtl .ui-datepicker-group-middle .ui-datepicker-header {
  border-right-width: 0;
  border-left-width: 1px;
}

.ui-datepicker-cover {
  display: none;
  display: block;
  position: absolute;
  z-index: -1;
  filter: mask();
  top: -4px;
  left: -4px;
  width: 200px;
  height: 200px;
}

.flags_sprite {
  background: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/flags_sprite_2.png) no-repeat top left;
  width: 16px;
  height: 11px;
  display: inline-block;
  background-position: -52px -1200px;
}

.flags_sprite.ad {
  background-position: 0 0;
}

.flags_sprite.ae {
  background-position: 0 -21px;
}

.flags_sprite.af {
  background-position: 0 -42px;
}

.flags_sprite.ag {
  background-position: 0 -63px;
}

.flags_sprite.ai {
  background-position: 0 -84px;
}

.flags_sprite.al {
  background-position: 0 -105px;
}

.flags_sprite.am {
  background-position: 0 -126px;
}

.flags_sprite.an {
  background-position: 0 -147px;
}

.flags_sprite.ao {
  background-position: 0 -168px;
}

.flags_sprite.ar {
  background-position: 0 -189px;
}

.flags_sprite.as {
  background-position: 0 -210px;
}

.flags_sprite.at {
  background-position: 0 -231px;
}

.flags_sprite.au {
  background-position: 0 -252px;
}

.flags_sprite.aw {
  background-position: 0 -273px;
}

.flags_sprite.ax {
  background-position: 0 -294px;
}

.flags_sprite.az {
  background-position: 0 -315px;
}

.flags_sprite.ba {
  background-position: 0 -336px;
}

.flags_sprite.bb {
  background-position: 0 -357px;
}

.flags_sprite.bd {
  background-position: 0 -378px;
}

.flags_sprite.be {
  background-position: 0 -399px;
}

.flags_sprite.bf {
  background-position: 0 -420px;
}

.flags_sprite.bg {
  background-position: 0 -441px;
}

.flags_sprite.bh {
  background-position: 0 -462px;
}

.flags_sprite.bi {
  background-position: 0 -483px;
}

.flags_sprite.bj {
  background-position: 0 -504px;
}

.flags_sprite.bm {
  background-position: 0 -525px;
}

.flags_sprite.bn {
  background-position: 0 -546px;
}

.flags_sprite.bo {
  background-position: 0 -567px;
}

.flags_sprite.br {
  background-position: 0 -588px;
}

.flags_sprite.bs {
  background-position: 0 -609px;
}

.flags_sprite.bt {
  background-position: 0 -630px;
}

.flags_sprite.bv {
  background-position: 0 -651px;
}

.flags_sprite.bw {
  background-position: 0 -672px;
}

.flags_sprite.by {
  background-position: 0 -693px;
}

.flags_sprite.bz {
  background-position: 0 -714px;
}

.flags_sprite.ca {
  background-position: 0 -735px;
}

.flags_sprite.catalonia {
  background-position: 0 -756px;
}

.flags_sprite.cc {
  background-position: 0 -777px;
}

.flags_sprite.cd {
  background-position: 0 -798px;
}

.flags_sprite.cf {
  background-position: 0 -819px;
}

.flags_sprite.cg {
  background-position: 0 -840px;
}

.flags_sprite.ch {
  background-position: 0 -861px;
}

.flags_sprite.ci {
  background-position: 0 -882px;
}

.flags_sprite.ck {
  background-position: 0 -903px;
}

.flags_sprite.cl {
  background-position: 0 -924px;
}

.flags_sprite.cm {
  background-position: 0 -945px;
}

.flags_sprite.cn {
  background-position: 0 -966px;
}

.flags_sprite.co {
  background-position: 0 -987px;
}

.flags_sprite.cr {
  background-position: 0 -1008px;
}

.flags_sprite.cs {
  background-position: 0 -1029px;
}

.flags_sprite.cu {
  background-position: 0 -1050px;
}

.flags_sprite.cv {
  background-position: 0 -1071px;
}

.flags_sprite.cx {
  background-position: 0 -1092px;
}

.flags_sprite.cy {
  background-position: 0 -1113px;
}

.flags_sprite.cz {
  background-position: 0 -1134px;
}

.flags_sprite.de {
  background-position: 0 -1155px;
}

.flags_sprite.dj {
  background-position: 0 -1176px;
}

.flags_sprite.dk {
  background-position: 0 -1197px;
}

.flags_sprite.dm {
  background-position: 0 -1218px;
}

.flags_sprite.do {
  background-position: 0 -1239px;
}

.flags_sprite.dz {
  background-position: 0 -1260px;
}

.flags_sprite.ec {
  background-position: 0 -1281px;
}

.flags_sprite.ee {
  background-position: 0 -1302px;
}

.flags_sprite.eg {
  background-position: 0 -1323px;
}

.flags_sprite.eh {
  background-position: 0 -1344px;
}

.flags_sprite.england {
  background-position: 0 -1365px;
}

.flags_sprite.er {
  background-position: 0 -1386px;
}

.flags_sprite.es {
  background-position: 0 -1407px;
}

.flags_sprite.et {
  background-position: 0 -1428px;
}

.flags_sprite.europeanunion {
  background-position: 0 -1449px;
}

.flags_sprite.fam {
  background-position: 0 -1470px;
}

.flags_sprite.fi {
  background-position: 0 -1491px;
}

.flags_sprite.fj {
  background-position: 0 -1512px;
}

.flags_sprite.fk {
  background-position: 0 -1533px;
}

.flags_sprite.fm {
  background-position: 0 -1554px;
}

.flags_sprite.fo {
  background-position: 0 -1575px;
}

.flags_sprite.fr {
  background-position: 0 -1596px;
}

.flags_sprite.ga {
  background-position: 0 -1617px;
}

.flags_sprite.gb {
  background-position: 0 -1638px;
}

.flags_sprite.uk {
  background-position: 0 -1638px;
}

.flags_sprite.gd {
  background-position: 0 -1659px;
}

.flags_sprite.ge {
  background-position: 0 -1680px;
}

.flags_sprite.gf {
  background-position: 0 -1701px;
}

.flags_sprite.gg {
  background-position: 0 -1365px;
}

.flags_sprite.gh {
  background-position: 0 -1722px;
}

.flags_sprite.gi {
  background-position: 0 -1743px;
}

.flags_sprite.gl {
  background-position: 0 -1764px;
}

.flags_sprite.gm {
  background-position: 0 -1785px;
}

.flags_sprite.gn {
  background-position: 0 -1806px;
}

.flags_sprite.gp {
  background-position: 0 -1827px;
}

.flags_sprite.gq {
  background-position: 0 -1848px;
}

.flags_sprite.gr {
  background-position: 0 -1869px;
}

.flags_sprite.gs {
  background-position: 0 -1890px;
}

.flags_sprite.gt {
  background-position: 0 -1911px;
}

.flags_sprite.gu {
  background-position: 0 -1932px;
}

.flags_sprite.gw {
  background-position: 0 -1953px;
}

.flags_sprite.gy {
  background-position: 0 -1974px;
}

.flags_sprite.hk {
  background-position: -26px 0;
}

.flags_sprite.hm {
  background-position: -26px -21px;
}

.flags_sprite.hn {
  background-position: -26px -42px;
}

.flags_sprite.hr {
  background-position: -26px -63px;
}

.flags_sprite.ht {
  background-position: -26px -84px;
}

.flags_sprite.hu {
  background-position: -26px -105px;
}

.flags_sprite.id {
  background-position: -26px -126px;
}

.flags_sprite.ie {
  background-position: -26px -147px;
}

.flags_sprite.il {
  background-position: -26px -168px;
}

.flags_sprite.im {
  background-position: -26px 0;
}

.flags_sprite.in {
  background-position: -26px -189px;
}

.flags_sprite.io {
  background-position: -26px -210px;
}

.flags_sprite.iq {
  background-position: -26px -231px;
}

.flags_sprite.ir {
  background-position: -26px -252px;
}

.flags_sprite.is {
  background-position: -26px -273px;
}

.flags_sprite.it {
  background-position: -26px -294px;
}

.flags_sprite.jm {
  background-position: -26px -315px;
}

.flags_sprite.jo {
  background-position: -26px -336px;
}

.flags_sprite.jp {
  background-position: -26px -357px;
}

.flags_sprite.ke {
  background-position: -26px -378px;
}

.flags_sprite.kg {
  background-position: -26px -399px;
}

.flags_sprite.kh {
  background-position: -26px -420px;
}

.flags_sprite.ki {
  background-position: -26px -441px;
}

.flags_sprite.km {
  background-position: -26px -462px;
}

.flags_sprite.kn {
  background-position: -26px -483px;
}

.flags_sprite.kp {
  background-position: -26px -504px;
}

.flags_sprite.kr {
  background-position: -26px -525px;
}

.flags_sprite.kw {
  background-position: -26px -546px;
}

.flags_sprite.ky {
  background-position: -26px -567px;
}

.flags_sprite.kz {
  background-position: -26px -588px;
}

.flags_sprite.la {
  background-position: -26px -609px;
}

.flags_sprite.lb {
  background-position: -26px -630px;
}

.flags_sprite.lc {
  background-position: -26px -651px;
}

.flags_sprite.li {
  background-position: -26px -672px;
}

.flags_sprite.lk {
  background-position: -26px -693px;
}

.flags_sprite.lr {
  background-position: -26px -714px;
}

.flags_sprite.ls {
  background-position: -26px -735px;
}

.flags_sprite.lt {
  background-position: -26px -756px;
}

.flags_sprite.lu {
  background-position: -26px -777px;
}

.flags_sprite.lv {
  background-position: -26px -798px;
}

.flags_sprite.ly {
  background-position: -26px -819px;
}

.flags_sprite.ma {
  background-position: -26px -840px;
}

.flags_sprite.mc {
  background-position: -26px -861px;
}

.flags_sprite.md {
  background-position: -26px -882px;
}

.flags_sprite.me {
  background-position: -26px -903px;
}

.flags_sprite.mg {
  background-position: -26px -925px;
}

.flags_sprite.mh {
  background-position: -26px -946px;
}

.flags_sprite.mk {
  background-position: -26px -967px;
}

.flags_sprite.ml {
  background-position: -26px -988px;
}

.flags_sprite.mm {
  background-position: -26px -1009px;
}

.flags_sprite.mn {
  background-position: -26px -1030px;
}

.flags_sprite.mo {
  background-position: -26px -1051px;
}

.flags_sprite.mp {
  background-position: -26px -1072px;
}

.flags_sprite.mq {
  background-position: -26px -1093px;
}

.flags_sprite.mr {
  background-position: -26px -1114px;
}

.flags_sprite.ms {
  background-position: -26px -1135px;
}

.flags_sprite.mt {
  background-position: -26px -1156px;
}

.flags_sprite.mu {
  background-position: -26px -1177px;
}

.flags_sprite.mv {
  background-position: -26px -1198px;
}

.flags_sprite.mw {
  background-position: -26px -1219px;
}

.flags_sprite.mx {
  background-position: -26px -1240px;
}

.flags_sprite.my {
  background-position: -26px -1261px;
}

.flags_sprite.mz {
  background-position: -26px -1282px;
}

.flags_sprite.na {
  background-position: -26px -1303px;
}

.flags_sprite.nc {
  background-position: -26px -1324px;
}

.flags_sprite.ne {
  background-position: -26px -1345px;
}

.flags_sprite.nf {
  background-position: -26px -1366px;
}

.flags_sprite.ng {
  background-position: -26px -1387px;
}

.flags_sprite.ni {
  background-position: -26px -1408px;
}

.flags_sprite.nl {
  background-position: -26px -1429px;
}

.flags_sprite.no {
  background-position: -26px -1450px;
}

.flags_sprite.np {
  background-position: -26px -1471px;
}

.flags_sprite.nr {
  background-position: -26px -1492px;
}

.flags_sprite.nu {
  background-position: -26px -1513px;
}

.flags_sprite.nz {
  background-position: -26px -1534px;
}

.flags_sprite.om {
  background-position: -26px -1555px;
}

.flags_sprite.pa {
  background-position: -26px -1576px;
}

.flags_sprite.pe {
  background-position: -26px -1597px;
}

.flags_sprite.pf {
  background-position: -26px -1618px;
}

.flags_sprite.pg {
  background-position: -26px -1639px;
}

.flags_sprite.ph {
  background-position: -26px -1660px;
}

.flags_sprite.pk {
  background-position: -26px -1681px;
}

.flags_sprite.pl {
  background-position: -26px -1702px;
}

.flags_sprite.pm {
  background-position: -26px -1723px;
}

.flags_sprite.pn {
  background-position: -26px -1744px;
}

.flags_sprite.pr {
  background-position: -26px -1765px;
}

.flags_sprite.ps {
  background-position: -26px -1786px;
}

.flags_sprite.pt {
  background-position: -26px -1807px;
}

.flags_sprite.pw {
  background-position: -26px -1828px;
}

.flags_sprite.py {
  background-position: -26px -1849px;
}

.flags_sprite.qa {
  background-position: -26px -1870px;
}

.flags_sprite.re {
  background-position: -26px -1891px;
}

.flags_sprite.ro {
  background-position: -26px -1912px;
}

.flags_sprite.rs {
  background-position: -26px -1933px;
}

.flags_sprite.ru {
  background-position: -26px -1954px;
}

.flags_sprite.rw {
  background-position: -26px -1975px;
}

.flags_sprite.sa {
  background-position: -52px 0;
}

.flags_sprite.sb {
  background-position: -52px -21px;
}

.flags_sprite.sc {
  background-position: -52px -42px;
}

.flags_sprite.scotland {
  background-position: -52px -63px;
}

.flags_sprite.sd {
  background-position: -52px -84px;
}

.flags_sprite.se {
  background-position: -52px -105px;
}

.flags_sprite.sw {
  background-position: -52px -105px;
}

.flags_sprite.sg {
  background-position: -52px -126px;
}

.flags_sprite.sh {
  background-position: -52px -147px;
}

.flags_sprite.si {
  background-position: -52px -168px;
}

.flags_sprite.sj {
  background-position: -52px -189px;
}

.flags_sprite.sk {
  background-position: -52px -210px;
}

.flags_sprite.sl {
  background-position: -52px -231px;
}

.flags_sprite.sm {
  background-position: -52px -252px;
}

.flags_sprite.sn {
  background-position: -52px -273px;
}

.flags_sprite.so {
  background-position: -52px -294px;
}

.flags_sprite.sr {
  background-position: -52px -315px;
}

.flags_sprite.st {
  background-position: -52px -336px;
}

.flags_sprite.sv {
  background-position: -52px -357px;
}

.flags_sprite.sy {
  background-position: -52px -378px;
}

.flags_sprite.sz {
  background-position: -52px -399px;
}

.flags_sprite.tc {
  background-position: -52px -420px;
}

.flags_sprite.td {
  background-position: -52px -441px;
}

.flags_sprite.tf {
  background-position: -52px -462px;
}

.flags_sprite.tg {
  background-position: -52px -483px;
}

.flags_sprite.th {
  background-position: -52px -504px;
}

.flags_sprite.tj {
  background-position: -52px -525px;
}

.flags_sprite.tk {
  background-position: -52px -546px;
}

.flags_sprite.tl {
  background-position: -52px -567px;
}

.flags_sprite.tm {
  background-position: -52px -588px;
}

.flags_sprite.tn {
  background-position: -52px -609px;
}

.flags_sprite.to {
  background-position: -52px -630px;
}

.flags_sprite.tr {
  background-position: -52px -651px;
}

.flags_sprite.tt {
  background-position: -52px -672px;
}

.flags_sprite.tv {
  background-position: -52px -693px;
}

.flags_sprite.tw {
  background-position: -52px -714px;
}

.flags_sprite.tz {
  background-position: -52px -735px;
}

.flags_sprite.ua {
  background-position: -52px -756px;
}

.flags_sprite.ug {
  background-position: -52px -777px;
}

.flags_sprite.um {
  background-position: -52px -798px;
}

.flags_sprite.us {
  background-position: -52px -819px;
}

.flags_sprite.uy {
  background-position: -52px -840px;
}

.flags_sprite.uz {
  background-position: -52px -861px;
}

.flags_sprite.va {
  background-position: -52px -882px;
}

.flags_sprite.vc {
  background-position: -52px -903px;
}

.flags_sprite.ve {
  background-position: -52px -924px;
}

.flags_sprite.vg {
  background-position: -52px -945px;
}

.flags_sprite.vi {
  background-position: -52px -966px;
}

.flags_sprite.vn {
  background-position: -52px -987px;
}

.flags_sprite.vu {
  background-position: -52px -1008px;
}

.flags_sprite.wales {
  background-position: -52px -1029px;
}

.flags_sprite.wf {
  background-position: -52px -1050px;
}

.flags_sprite.ws {
  background-position: -52px -1071px;
}

.flags_sprite.ye {
  background-position: -52px -1092px;
}

.flags_sprite.yt {
  background-position: -52px -1113px;
}

.flags_sprite.za {
  background-position: -52px -1134px;
}

.flags_sprite.zm {
  background-position: -52px -1155px;
}

.flags_sprite.zw {
  background-position: -52px -1176px;
}

#dialogLanguage {
  width: auto;
  min-height: 109.267px;
  height: auto;
  display: none;
}

.select-language {
  margin: 5px 0;
  text-align: center;
}

.select-language input {
  border: 0;
  background-repeat: no-repeat;
  width: 235px;
  height: 120px;
  cursor: pointer;
}

.select-language input.it {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/SupportedLanguages/it.png);
}

.select-language input.en {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/SupportedLanguages/en.png);
}

.select-language .selected {
  background-position: -235px 0;
}

.select-language form {
  display: inline-block;
  text-align: center;
}

.select-language form+form {
  padding-left: 20px;
}

.select-language form span {
  margin-top: 3px;
  display: block;
}

.box {
  width: 100%;
  color: #52565c;
  padding: 5px;
  font-size: 12px;
  border: 1px solid #a3a6a8;
  background-color: #d4d4d4;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: linear-gradient(top,#f3f3f3,#d4d4d4);
  -webkit-box-shadow: inset 0 1px 0 rgba(255,255,255,.3),inset 0 0 0 1px rgba(255,255,255,.1),0 1px 0 rgba(255,255,255,.7);
  -moz-box-shadow: inset 0 1px 0 rgba(255,255,255,.3),inset 0 0 0 1px rgba(255,255,255,.1),0 1px 0 rgba(255,255,255,.7);
  box-shadow: inset 0 1px 0 rgba(255,255,255,.3),inset 0 0 0 1px rgba(255,255,255,.1),0 1px 0 rgba(255,255,255,.7);
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
  -webkit-touch-callout: none;
  -webkit-user-select: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

.box-error {
  color: #fff;
  width: 100%;
  padding: 5px;
  font-size: 12px;
  border: 1px solid #a3a6a8;
  background-color: #ee3425;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: linear-gradient(top,#ee3425,#dd3022);
  -webkit-box-shadow: inset 0 1px 0 rgba(255,255,255,.3),inset 0 0 0 1px rgba(255,255,255,.1),0 1px 0 rgba(255,255,255,.7);
  -moz-box-shadow: inset 0 1px 0 rgba(255,255,255,.3),inset 0 0 0 1px rgba(255,255,255,.1),0 1px 0 rgba(255,255,255,.7);
  box-shadow: inset 0 1px 0 rgba(255,255,255,.3),inset 0 0 0 1px rgba(255,255,255,.1),0 1px 0 rgba(255,255,255,.7);
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
}

.greenRating {
  padding: 2px 5px;
  letter-spacing: normal;
  color: #f5faef;
  font-weight: 700;
  border: 1px solid #aaa;
  background-color: #629721;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: linear-gradient(top,#89be48,#629721);
  text-decoration: none;
  text-align: center;
  -moz-border-radius-topleft: 20px;
  -moz-border-radius-topright: 5px;
  -moz-border-radius-bottomright: 20px;
  -moz-border-radius-bottomleft: 5px;
  -webkit-border-top-left-radius: 20px;
  -webkit-border-top-right-radius: 5px;
  -webkit-border-bottom-right-radius: 20px;
  -webkit-border-bottom-left-radius: 5px;
}

.amberRating {
  padding: 2px 5px;
  letter-spacing: normal;
  color: #f5faef;
  border-top: solid 1px #aaa;
  border-right: solid 1px #aaa;
  font-weight: 700;
  background-color: #ffb400;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: linear-gradient(top,#ffb400,#ff9401);
  text-decoration: none;
  text-align: center;
  -moz-border-radius-topleft: 20px;
  -moz-border-radius-topright: 5px;
  -moz-border-radius-bottomright: 20px;
  -moz-border-radius-bottomleft: 5px;
  -webkit-border-top-left-radius: 20px;
  -webkit-border-top-right-radius: 5px;
  -webkit-border-bottom-right-radius: 20px;
  -webkit-border-bottom-left-radius: 5px;
}

.redRating {
  padding: 2px 5px;
  letter-spacing: normal;
  color: #f5faef;
  border-top: solid 1px #aaa;
  border-left: solid 1px #aaa;
  font-weight: 700;
  background-color: #ee3425;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: linear-gradient(top,#ee3425,#dd3022);
  text-decoration: none;
  text-align: center;
  -moz-border-radius-topleft: 20px;
  -moz-border-radius-topright: 5px;
  -moz-border-radius-bottomright: 20px;
  -moz-border-radius-bottomleft: 5px;
  -webkit-border-top-left-radius: 20px;
  -webkit-border-top-right-radius: 5px;
  -webkit-border-bottom-right-radius: 20px;
  -webkit-border-bottom-left-radius: 5px;
}

.tabrow {
  text-align: left;
  list-style: none;
  margin: 0;
  padding: 0;
  line-height: 32px;
  font-size: 12px;
  font-family: Arial,Helvetica,sans-serif;
  position: relative;
  z-index: 100;
}

.tabrow li {
  border: 1px solid #aaa;
  background: #ececec;
  background: 0;
  background: 0;
  background: 0;
  background: 0;
  background: linear-gradient(top,#d4d4d450%,#f8f8f8100%);
  display: inline-block;
  position: relative;
  z-index: 0;
  text-shadow: 0 1px #fff;
  margin: 0;
  padding: 0 10px;
}

.tabrow ul {
  position: absolute;
  left: 0;
  margin: 0;
  padding: 0;
  list-style: none;
  border-bottom: 2px solid #aaa;
  border-left: 1px solid #aaa;
  border-right: 1px solid #aaa;
  -webkit-box-shadow: inset 5px 5px 5px 5px rgba(115,110,95,.3),inset 5px 5px 5px 5px rgba(115,110,95,.3),5px 5px 5px 5px rgba(115,110,95,.3);
  -moz-box-shadow: inset 5px 5px 5px 5px rgba(115,110,95,.3),inset 5px 5px 5px 5px rgba(115,110,95,.3),5px 5px 5px 5px rgba(115,110,95,.3);
  box-shadow: inset 5px 5px 5px 5px rgba(115,110,95,.3),inset 5px 5px 5px 5px rgba(115,110,95,.3),5px 5px 5px 5px rgba(115,110,95,.3);
}

.tabrow ul li {
  width: 300px;
  float: left;
  border-bottom: 1px solid #aaa;
  background: #fff;
  background: 0;
  background: 0;
  background: 0;
  background: 0;
  background: linear-gradient(top,#fff50%,#f8f8f8100%);
  display: inline-block;
}

.tabrow a {
  color: #555;
  text-decoration: none;
}

.tabrow a:Hover {
  color: #ed2a24;
  z-index: 2;
  border-bottom-color: #fff;
}

.tabrow li.selected {
  background: #fff;
  color: #ed2a24;
  z-index: 2;
  border-bottom-color: #fff;
  padding-top: 2px;
  font-weight: 700;
}

.tabrow:before {
  position: absolute;
  content: " ";
  width: 100%;
  bottom: 0;
  left: 0;
  border-bottom: 1px solid #aaa;
  z-index: 1;
}

.tabBox {
  border-bottom: 1px solid #aaa;
  border-left: 1px solid #aaa;
  border-right: 1px solid #aaa;
}

.btn {
  padding: 5px 15px;
  font-size: 12px;
  letter-spacing: normal;
  color: #52565c;
  font-weight: 700;
  text-shadow: 1px 1px 0 rgba(255,255,255,.65);
  border: 1px solid #aaa;
  background-color: #f8f8f8;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: linear-gradient(top,#ececec,#f8f8f8);
  -webkit-touch-callout: none;
  -webkit-user-select: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  text-decoration: none;
}

.btn:hover {
  color: #494c4f;
  background-color: #d9dde0;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: linear-gradient(top,#eff3f5,#d9dde0);
  -webkit-box-shadow: inset 0 1px 0 rgba(255,255,255,.3),inset 0 0 0 1px rgba(255,255,255,.1),0 1px 0 rgba(255,255,255,.7);
  -moz-box-shadow: inset 0 1px 0 rgba(255,255,255,.3),inset 0 0 0 1px rgba(255,255,255,.1),0 1px 0 rgba(255,255,255,.7);
  box-shadow: inset 0 1px 0 rgba(255,255,255,.3),inset 0 0 0 1px rgba(255,255,255,.1),0 1px 0 rgba(255,255,255,.7);
  text-decoration: none;
}

.btn:active {
  background-color: #d4d4d4;
}

.btn-find {
  padding: 2px 5px 2px 15px;
  font-size: 14px;
  color: #494c4f;
  font-weight: 700;
  border: 1px solid #0154a8;
  background-color: #d9dde0;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: linear-gradient(top,#eff3f5,#d9dde0);
  -webkit-box-shadow: inset 0 1px 0 rgba(255,255,255,.3),inset 0 0 0 1px rgba(255,255,255,.1),0 1px 0 rgba(255,255,255,.7);
  -moz-box-shadow: inset 0 1px 0 rgba(255,255,255,.3),inset 0 0 0 1px rgba(255,255,255,.1),0 1px 0 rgba(255,255,255,.7);
  box-shadow: inset 0 1px 0 rgba(255,255,255,.3),inset 0 0 0 1px rgba(255,255,255,.1),0 1px 0 rgba(255,255,255,.7);
  text-decoration: none;
}

.btn-find:hover {
  color: #fff;
  border: 1px solid #0154a8;
  background-color: #3986d4;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: linear-gradient(top,#0154a8,#3986d4);
  text-decoration: none;
}

.btn-grn {
  padding: 5px 15px;
  font-size: 12px;
  letter-spacing: normal;
  color: #f5faef;
  font-weight: 700;
  text-shadow: 1px 1px 0 rgba(0,0,0,.65);
  border: 1px solid #468000;
  background-color: #629721;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: linear-gradient(top,#89be48,#629721);
  -webkit-box-shadow: inset 0 1px 0 rgba(255,255,255,.3),inset 0 0 0 1px rgba(255,255,255,.1),0 1px 0 rgba(255,255,255,.7);
  -moz-box-shadow: inset 0 1px 0 rgba(255,255,255,.3),inset 0 0 0 1px rgba(255,255,255,.1),0 1px 0 rgba(255,255,255,.7);
  box-shadow: inset 0 1px 0 rgba(255,255,255,.3),inset 0 0 0 1px rgba(255,255,255,.1),0 1px 0 rgba(255,255,255,.7);
  -webkit-touch-callout: none;
  -webkit-user-select: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  text-decoration: none;
}

.btn-grn:hover {
  color: #fff;
  background-color: #7db13e;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: linear-gradient(top,#94ca52,#679a28);
  -webkit-box-shadow: inset 0 1px 0 rgba(255,255,255,.3),inset 0 0 0 1px rgba(255,255,255,.1),0 1px 0 rgba(255,255,255,.7);
  -moz-box-shadow: inset 0 1px 0 rgba(255,255,255,.3),inset 0 0 0 1px rgba(255,255,255,.1),0 1px 0 rgba(255,255,255,.7);
  box-shadow: inset 0 1px 0 rgba(255,255,255,.3),inset 0 0 0 1px rgba(255,255,255,.1),0 1px 0 rgba(255,255,255,.7);
  text-decoration: none;
}

.btn-grn:active {
  background-color: #629721;
}

.btn-Order {
  padding: 20px 10px;
  font-size: 14px;
  display: block;
  letter-spacing: normal;
  text-align: center;
  color: #f5faef;
  font-weight: 700;
  text-shadow: 1px 1px 0 rgba(0,0,0,.65);
  border: 1px solid #468000;
  background-color: #629721;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: linear-gradient(top,#89be48,#629721);
  -webkit-box-shadow: inset 0 1px 0 rgba(255,255,255,.3),inset 0 0 0 1px rgba(255,255,255,.1),0 1px 0 rgba(255,255,255,.7);
  -moz-box-shadow: inset 0 1px 0 rgba(255,255,255,.3),inset 0 0 0 1px rgba(255,255,255,.1),0 1px 0 rgba(255,255,255,.7);
  box-shadow: inset 0 1px 0 rgba(255,255,255,.3),inset 0 0 0 1px rgba(255,255,255,.1),0 1px 0 rgba(255,255,255,.7);
  -webkit-touch-callout: none;
  -webkit-user-select: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  text-decoration: none;
  -webkit-border-radius: 6px;
  -moz-border-radius: 6px;
  border-radius: 6px;
}

.btn-Order:hover {
  color: #fff;
  background-color: #2b5196;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: linear-gradient(top,#5a77ca,#2b5196);
  -webkit-box-shadow: inset 0 1px 0 rgba(255,255,255,.3),inset 0 0 0 1px rgba(255,255,255,.1),0 1px 0 rgba(255,255,255,.7);
  -moz-box-shadow: inset 0 1px 0 rgba(255,255,255,.3),inset 0 0 0 1px rgba(255,255,255,.1),0 1px 0 rgba(255,255,255,.7);
  box-shadow: inset 0 1px 0 rgba(255,255,255,.3),inset 0 0 0 1px rgba(255,255,255,.1),0 1px 0 rgba(255,255,255,.7);
  text-decoration: none;
}

.btn-blu:active {
  background-color: #23498e;
}

.btn-red {
  padding: 5px 15px;
  font-size: 12px;
  letter-spacing: normal;
  color: #faf3f3;
  font-weight: 700;
  text-shadow: 1px 1px 0 rgba(0,0,0,.65);
  border: 1px solid #841313;
  background-color: #e20000;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: linear-gradient(top,#e20000,#bc0e0e);
  -webkit-box-shadow: inset 0 1px 0 rgba(255,255,255,.3),inset 0 0 0 1px rgba(255,255,255,.1),0 1px 0 rgba(255,255,255,.7);
  -moz-box-shadow: inset 0 1px 0 rgba(255,255,255,.3),inset 0 0 0 1px rgba(255,255,255,.1),0 1px 0 rgba(255,255,255,.7);
  box-shadow: inset 0 1px 0 rgba(255,255,255,.3),inset 0 0 0 1px rgba(255,255,255,.1),0 1px 0 rgba(255,255,255,.7);
  -webkit-touch-callout: none;
  -webkit-user-select: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  text-decoration: none;
}

.btn-red:hover {
  color: #fff;
  background-color: #9e2b2b;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: linear-gradient(top,#bf4444,#9e2b2b);
  -webkit-box-shadow: inset 0 1px 0 rgba(255,255,255,.3),inset 0 0 0 1px rgba(255,255,255,.1),0 1px 0 rgba(255,255,255,.7);
  -moz-box-shadow: inset 0 1px 0 rgba(255,255,255,.3),inset 0 0 0 1px rgba(255,255,255,.1),0 1px 0 rgba(255,255,255,.7);
  box-shadow: inset 0 1px 0 rgba(255,255,255,.3),inset 0 0 0 1px rgba(255,255,255,.1),0 1px 0 rgba(255,255,255,.7);
  text-decoration: none;
}

.btn-red:active {
  background-color: #bc0e0e;
}

.btn:active,.btn-grn:active,.btn-blu:active,.btn-red:active {
  background-image: none;
  -webkit-box-shadow: inset 0 1px 5px rgba(0,0,0,.44),0 1px 0 rgba(255,255,255,.5);
  -moz-box-shadow: inset 0 1px 5px rgba(0,0,0,.44),0 1px 0 rgba(255,255,255,.5);
  box-shadow: inset 0 1px 5px rgba(0,0,0,.44),0 1px 0 rgba(255,255,255,.5);
}

label {
  display: block;
  font-size: 12px;
  font-weight: 700;
  color: #434343;
  text-shadow: 1px 1px 0 rgba(255,255,255,.65);
  margin-bottom: 5px;
}

.input-single {
  display: block;
  font-size: 12px;
  color: #777;
  background: #f9f9f9;
  width: 280px;
  padding: 3px 10px;
  margin-bottom: 5px;
  border: 1px solid #aaa;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
  -webkit-box-shadow: inset 0 1px 0 rgba(34,25,25,.15),0 1px 0 #fff;
  -moz-box-shadow: inset 0 1px 0 rgba(34,25,25,.15),0 1px 0 #fff;
  box-shadow: inset 0 1px 0 rgba(34,25,25,.15),0 1px 0 #fff;
  -webkit-transition: all .4s linear;
  -moz-transition: all .4s linear;
  -o-transition: all .4s linear;
  transition: all .4s linear;
}

.input-single-company {
  display: block;
  font-size: 12px;
  color: #777;
  background: #f9f9f9;
  width: 420px;
  padding: 3px 10px;
  margin-bottom: 5px;
  border: 1px solid #aaa;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
  -webkit-box-shadow: inset 0 1px 0 rgba(34,25,25,.15),0 1px 0 #fff;
  -moz-box-shadow: inset 0 1px 0 rgba(34,25,25,.15),0 1px 0 #fff;
  box-shadow: inset 0 1px 0 rgba(34,25,25,.15),0 1px 0 #fff;
  -webkit-transition: all .4s linear;
  -moz-transition: all .4s linear;
  -o-transition: all .4s linear;
  transition: all .4s linear;
}

.input-single-country {
  display: block;
  font-size: 12px;
  color: #777;
  background: #f9f9f9;
  width: 440px;
  padding: 3px 10px;
  margin-bottom: 5px;
  border: 1px solid #aaa;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
  -webkit-box-shadow: inset 0 1px 0 rgba(34,25,25,.15),0 1px 0 #fff;
  -moz-box-shadow: inset 0 1px 0 rgba(34,25,25,.15),0 1px 0 #fff;
  box-shadow: inset 0 1px 0 rgba(34,25,25,.15),0 1px 0 #fff;
  -webkit-transition: all .4s linear;
  -moz-transition: all .4s linear;
  -o-transition: all .4s linear;
  transition: all .4s linear;
}

.input-single-small {
  display: inline;
  font-size: 12px;
  color: #777;
  background: #f9f9f9;
  width: 80px;
  padding: 3px 10px;
  margin-bottom: 5px;
  border: 1px solid #aaa;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
  -webkit-box-shadow: inset 0 1px 0 rgba(34,25,25,.15),0 1px 0 #fff;
  -moz-box-shadow: inset 0 1px 0 rgba(34,25,25,.15),0 1px 0 #fff;
  box-shadow: inset 0 1px 0 rgba(34,25,25,.15),0 1px 0 #fff;
  -webkit-transition: all .4s linear;
  -moz-transition: all .4s linear;
  -o-transition: all .4s linear;
  transition: all .4s linear;
}

.input-block {
  display: block;
  font-family: Arial,Verdana,Tahoma,sans-serif;
  font-size: 12px;
  line-height: 1.2em;
  color: #777;
  background: #f9f9f9;
  width: 330px;
  height: 90px;
  padding: 8px 9px;
  margin-bottom: 20px;
  border: 1px solid #aaa;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
  -webkit-box-shadow: inset 0 1px 0 rgba(34,25,25,.15),0 1px 0 #fff;
  -moz-box-shadow: inset 0 1px 0 rgba(34,25,25,.15),0 1px 0 #fff;
  box-shadow: inset 0 1px 0 rgba(34,25,25,.15),0 1px 0 #fff;
  -webkit-transition: all .4s linear;
  -moz-transition: all .4s linear;
  -o-transition: all .4s linear;
  transition: all .4s linear;
}

.input-single:focus,.input-block:focus,.input-single-small:focus {
  background: #fff;
  color: #474747;
  border-color: #aaa;
  -webkit-box-shadow: inset 0 1px 0 rgba(34,25,25,.15),0 1px 0 rgba(255,255,255,.8),0 0 11px rgba(96,96,235,.55);
  -moz-box-shadow: inset 0 1px 0 rgba(34,25,25,.15),0 1px 0 rgba(255,255,255,.8),0 0 11px rgba(96,96,235,.55);
  box-shadow: inset 0 1px 0 rgba(34,25,25,.15),0 1px 0 rgba(255,255,255,.8),0 0 11px rgba(96,96,235,.55);
}

.custom-checkbox {
  position: relative;
  display: inline-block;
  width: 100%;
  zoom: 1;
}

.custom-checkbox label {
  display: block;
  position: absolute;
  top: 2px;
  left: 25px;
}

.custom-checkbox>.ch-box {
  position: relative;
  display: block;
  margin-bottom: 8px;
  width: 14px;
  height: 14px;
  border: 1px solid #ccc;
  background-color: #eee;
  border-radius: 4px;
}

.custom-checkbox>.ch-box>.tick {
  position: absolute;
  left: 2px;
  top: -2px;
  width: 14px;
  height: 6px;
  border-bottom: 2px solid #454545;
  border-left: 2px solid #454545;
  -webkit-transform: rotate(-45deg);
  -moz-transform: rotate(-45deg);
  -o-transform: rotate(-45deg);
  -ms-transform: rotate(-45deg);
  transform: rotate(-45deg);
  filter: progid:DXImageTransform.Microsoft.Matrix(M11=.7071067811865476,M12=.7071067811865475,M21=-.7071067811865475,M22=.7071067811865476,sizingMethod='auto expand');
  display: none;
  zoom: 1;
}

.custom-checkbox>input:checked+.ch-box>.tick {
  display: block;
}

.custom-checkbox>input {
  position: absolute;
  outline: none;
  left: 0;
  top: 0;
  padding: 0;
  width: 16px;
  height: 16px;
  border: none;
  margin: 0;
  opacity: 0;
  z-index: 1;
}

.custom-checkbox>input:active+.ch-box {
  border-color: #aaa;
  background-color: #ddd;
}

​ .container:before,.container:after {
  content: "";
  display: table;
}

.container:after {
  clear: both;
}

.container {
  zoom: 1;
}

div.graybox {
  filter: url(filters.svg#grayscale);
  filter: gray;
  -webkit-filter: grayscale(1);
}

.greenRatingInd {
  padding: 2px 5px;
  letter-spacing: normal;
  color: #f5faef;
  font-weight: 700;
  border: 1px solid #aaa;
  background-color: #629721;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: linear-gradient(top,#89be48,#629721);
  text-decoration: none;
  text-align: center;
  -moz-border-radius-topleft: 20px;
  -moz-border-radius-topright: 5px;
  -moz-border-radius-bottomright: 20px;
  -moz-border-radius-bottomleft: 5px;
  -webkit-border-top-left-radius: 20px;
  -webkit-border-top-right-radius: 5px;
  -webkit-border-bottom-right-radius: 20px;
  -webkit-border-bottom-left-radius: 5px;
}

.amberRatingInd {
  padding: 2px 5px;
  letter-spacing: normal;
  color: #f5faef;
  border-top: solid 1px #aaa;
  border-right: solid 1px #aaa;
  font-weight: 700;
  background-color: #ffb400;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: linear-gradient(top,#ffb400,#ff9401);
  text-decoration: none;
  text-align: center;
  -moz-border-radius-topleft: 0;
  -moz-border-radius-topright: 5px;
  -moz-border-radius-bottomright: 0;
  -moz-border-radius-bottomleft: 0;
  -webkit-border-top-left-radius: 0;
  -webkit-border-top-right-radius: 5px;
  -webkit-border-bottom-right-radius: 0;
  -webkit-border-bottom-left-radius: 0;
}

.redRatingInd {
  padding: 2px 5px;
  letter-spacing: normal;
  color: #f5faef;
  border-top: solid 1px #aaa;
  border-left: solid 1px #aaa;
  font-weight: 700;
  background-color: #ee3425;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: linear-gradient(top,#ee3425,#dd3022);
  text-decoration: none;
  text-align: center;
  -moz-border-radius-topleft: 5px;
  -moz-border-radius-topright: 0;
  -moz-border-radius-bottomright: 0;
  -moz-border-radius-bottomleft: 0;
  -webkit-border-top-left-radius: 5px;
  -webkit-border-top-right-radius: 0;
  -webkit-border-bottom-right-radius: 0;
  -webkit-border-bottom-left-radius: 0;
}

* {
  font-family: Arial;
  font-size: 12px;
  margin: 0;
  padding: 0;
}

html {
  background: #fff url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/redbar.png) center 0;
  background-repeat: repeat-x;
  background-attachment: scroll;
  overflow-y: scroll;
  overflow-x: hidden;
}

body {
  color: #2d2d2d;
}

.wrapper {
  width: 1020px;
  margin: 0 auto;
  padding: 40px 0 0;
}

.header {
  position: relative;
  background: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/bg_content_24bit.png) no-repeat -1002px 0;
  height: 100px;
  _background: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/bg_content_8bit.png) -1002px 0 no-repeat;
}

.header .logo_box {
  width: 190px;
  float: left;
  height: 50px;
  margin: 30px 25px;
}

.content .side_area {
  width: 178px;
  display: inline;
  float: left;
  margin: 0 0 0 16px;
}

.content .main_area {
  width: 800px;
  float: right;
  padding: 10px;
  border: 1px solid #aaa;
}

.content .page_content {
  position: relative;
  display: inline;
}

.footer {
  margin-top: 10px;
}

.footer_content {
  text-align: center;
  height: 40px;
}

.toolbar {
  margin: 15px 0 0;
  padding: 5px;
  float: right;
}

.quick_search {
  position: relative;
  height: 63px;
  font-family: Arial,sans-serif;
  padding: 11px 0 0 5px;
  width: 161px;
  font-size: 12px;
  letter-spacing: normal;
  color: #faf3f3;
  border: 1px solid #841313;
  background-color: #e20000;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: linear-gradient(top,#e20000,#bc0e0e);
  -webkit-box-shadow: inset 0 1px 0 rgba(255,255,255,.3),inset 0 0 0 1px rgba(255,255,255,.1),0 1px 0 rgba(255,255,255,.7);
  -moz-box-shadow: inset 0 1px 0 rgba(255,255,255,.3),inset 0 0 0 1px rgba(255,255,255,.1),0 1px 0 rgba(255,255,255,.7);
  text-decoration: none;
}

.quick_search .quick_search_button {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/QUICKsearch.png);
  z-index: 20;
  position: absolute;
  width: 24px;
  display: block;
  cursor: pointer;
  height: 24px;
  top: 24px;
  left: 135px;
  border-width: 0;
}

.quick_search .quick_search_field {
  z-index: 10;
  position: absolute;
  width: 146px;
  font-size: 13px;
  top: 28px;
  left: 8px;
  padding: 1px 2px;
}

A {
  text-decoration: underline;
  color: #1459a7;
}

A:hover {
  text-decoration: underline;
}

.media_search {
  position: relative;
  font-family: Arial,sans-serif;
}

.media_search .media_search_button {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/search-blue.png);
  z-index: 20;
  position: absolute;
  width: 24px;
  display: block;
  cursor: pointer;
  height: 24px;
  top: 0;
  left: 276px;
  border-width: 0;
}

.mainButtonactive {
  display: block;
  background-image: url(./http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/sub_menuBG.png);
  background-repeat: no-repeat;
  background-position: 0 0;
  display: block;
  width: 185px;
  padding: 8px 0;
  text-align: center;
  text-decoration: none;
  color: #fff;
  font-weight: 700;
  text-decoration: none;
}

.mainButtonactive A {
  font-weight: 700;
  color: #fff;
  text-decoration: none;
  padding: 0 8px 0 0;
}

.mainButton {
  padding: 8px 0;
  font-size: 12px;
  width: 168px;
  letter-spacing: normal;
  color: #52565c;
  font-weight: 700;
  text-shadow: 1px 1px 0 rgba(255,255,255,.65);
  border: 1px solid #a3a6a8;
  background-color: #ececec;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: linear-gradient(top,#f3f3f3,#d4d4d4);
  -webkit-box-shadow: inset 0 1px 0 rgba(255,255,255,.3),inset 0 0 0 1px rgba(255,255,255,.1),0 1px 0 rgba(255,255,255,.7);
  -moz-box-shadow: inset 0 1px 0 rgba(255,255,255,.3),inset 0 0 0 1px rgba(255,255,255,.1),0 1px 0 rgba(255,255,255,.7);
  box-shadow: inset 0 1px 0 rgba(255,255,255,.3),inset 0 0 0 1px rgba(255,255,255,.1),0 1px 0 rgba(255,255,255,.7);
  -webkit-touch-callout: none;
  -webkit-user-select: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  text-decoration: none;
  text-align: center;
}

.mainButton:hover {
  color: #494c4f;
  background-color: #d9dde0;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: linear-gradient(top,#eff3f5,#d9dde0);
  -webkit-box-shadow: inset 0 1px 0 rgba(255,255,255,.3),inset 0 0 0 1px rgba(255,255,255,.1),0 1px 0 rgba(255,255,255,.7);
  -moz-box-shadow: inset 0 1px 0 rgba(255,255,255,.3),inset 0 0 0 1px rgba(255,255,255,.1),0 1px 0 rgba(255,255,255,.7);
  box-shadow: inset 0 1px 0 rgba(255,255,255,.3),inset 0 0 0 1px rgba(255,255,255,.1),0 1px 0 rgba(255,255,255,.7);
  text-decoration: none;
}

.mainButton A {
  text-decoration: none;
  color: #2d2d2d;
}

.mainButton A:hover {
  text-decoration: underline;
  font-weight: 700;
  color: ed2a24;
}

.mainMargin {
  margin-top: 15px;
}

div.RatingMain {
  background-repeat: no-repeat;
  font-weight: 700;
  text-align: left;
  color: #fff;
  height: 100px;
  width: 632px;
  padding: 15px 0 0 15px;
}

.RatingMain.A {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/CSITDashboard-Eng/A.png);
}

.RatingMain.B {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/CSITDashboard-Eng/B.png);
}

.RatingMain.C {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/CSITDashboard-Eng/C.png);
}

.RatingMain.D {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/CSITDashboard-Eng/D.png);
}

.RatingMain.E {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/CSITDashboard-Eng/E.png);
}

.RatingMain.X {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/CSITDashboard-Eng/notrated.png);
}

table.gridview {
  width: 100%;
  border-collapse: collapse;
  margin: 0;
  border: 0 0 0 0;
  border-style: none;
}

TABLE.gridview TH {
  border-bottom: #aaa 1px solid;
  padding-bottom: 2px;
  border-right-width: 0;
  padding-left: 6px;
  padding-right: 6px;
  background: #fff;
  border-top-width: 0;
  vertical-align: top;
  border-left-width: 0;
  padding-top: 2px;
}

TABLE.gridview TD {
  border-bottom: #aaa 1px solid;
  padding-bottom: 2px;
  border-right-width: 0;
  padding-left: 6px;
  padding-right: 6px;
  background: #fff;
  border-top-width: 0;
  border-left-width: 0;
  padding-top: 2px;
}

TABLE.gridview .pager table td {
  border: 0;
}

TABLE.gridview TH.title_bar {
  border-bottom: #bbb 1px solid;
  text-align: left;
  background: #f5f5f5;
  color: #000;
  font-size: 12px;
  font-weight: 700;
}

TABLE.gridview TR.title_bar TH {
  border-bottom: #bbb 1px solid;
  text-align: left;
  background: #f5f5f5;
  color: #000;
  font-size: 12px;
  font-weight: 700;
}

TABLE.gridview .title_bar {
  border-bottom: #bbb 1px solid;
  text-align: left;
  background: #f5f5f5;
  color: #000;
  font-size: 12px;
  font-weight: 700;
}

TABLE.gridview .title_row TH {
  border-bottom: #bbb 1px solid;
  text-align: left;
  text-transform: uppercase;
  background: #e9e9e9;
  color: #000;
  font-size: 12px;
  font-weight: 700;
}

TABLE.gridview TH {
  text-align: left;
  font-weight: 700;
}

TABLE.gridview .director TH {
  text-align: left;
  font-weight: 700;
  width: 250px;
}

TABLE.gridview .alt_cell {
  border-bottom: #dee6ee 1px solid;
  background: #f5f9fc;
}

TABLE.gridview TH {
  border-bottom: #aaa 1px solid;
  background-color: #f5f5f5;
}

TABLE.gridview TD {
  border-bottom: #aaa 1px solid;
  background-color: #f5f5f5;
}

TABLE.gridview .alt_row TH {
  border-bottom: #aaa 1px solid;
  background-color: #fff;
}

TABLE.gridview .alt_row TD {
  border-bottom: #aaa 1px solid;
  background-color: #fff;
}

TABLE.gridview .bottom_line TH {
  border-bottom: #999 1px solid;
}

TABLE.gridview .bottom_line TD {
  border-bottom: #999 1px solid;
}

TABLE.gridview .summary_row {
  font-weight: 700;
}

TABLE.gridview .align_left {
  text-align: left;
}

TABLE.gridview .align_center {
  text-align: center;
}

TABLE.gridview .align_right {
  text-align: right;
}

TABLE.stripview {
  margin: 0;
  width: 100%;
  border-collapse: collapse;
}

TABLE.stripview TH {
  border-bottom: #f0f 0 solid;
  border-left: #f0f 0 solid;
  padding-bottom: 2px;
  padding-left: 0;
  padding-right: 20px;
  vertical-align: top;
  border-top: #f0f 0 solid;
  border-right: #f0f 0 solid;
  padding-top: 2px;
}

TABLE.stripview TD {
  border-bottom: #f0f 0 solid;
  border-left: #f0f 0 solid;
  padding-bottom: 2px;
  padding-left: 0;
  padding-right: 20px;
  vertical-align: top;
  border-top: #f0f 0 solid;
  border-right: #f0f 0 solid;
  padding-top: 2px;
}

TABLE.stripview TH {
  text-align: left;
  padding-bottom: 2px;
  padding-left: 0;
  padding-right: 8px;
  font-weight: 700;
  padding-top: 2px;
}

TABLE.gridview TD.colaccounts {
  text-align: right;
}

TABLE.gridview TD.colchange {
  text-align: right;
}

td.standard {
  display: inline;
}

.alt_row {
  border-bottom: #aaa 1px solid;
  background-color: #fff;
}

.buttons_panel {
  margin: 0 0 0 10px;
  float: right;
  padding: 0 8px 2px 0;
}

a.large_button,a.large_button_inactive,a.large_button span,a.large_button_inactive span {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/page_content_8bit.png);
}

a.large_button,a.large_button_inactive {
  display: inline-block;
  text-decoration: none;
}

a.large_button span {
  cursor: pointer;
}

a.large_button_inactive span {
  cursor: default;
}

a.large_button span,a.large_button_inactive span {
  color: #333;
  font-weight: 700;
  display: inline-block;
  height: 15px;
}

.large_button,.large_button_inactive {
  background-position: -2270px -63px;
}

a.large_button span,a.large_button_inactive span {
  font-size: 12px;
  background-position: right -63px;
  margin: 0 0 0 11px;
  padding: 3px 11px 3px 0;
  height: 15px;
}

a:hover.large_button {
  background-position: -2270px -40px;
}

a:hover.large_button span {
  background-position: right -40px;
  color: #e20001;
}

.clear_all {
  clear: both;
}

.framework_sprite,.user .icon,.logout .icon,.countryflag SPAN {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/framework_sprite_24bit.png);
  _background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/framework_sprite_8bit.png);
}

.search_add_to_monitor,.search_add_to_monitor_True {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/framework_sprite_24bit.png);
  width: 14px;
  display: block;
  background-position: -497px -16px;
  height: 14px;
  cursor: pointer;
  _background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/framework_sprite_8bit.png);
}

H1 {
  margin: 1px 0 3px;
  font-size: 22px;
  font-weight: 400;
}

H1 SPAN {
  margin: 1px 0 3px;
  font-size: 22px;
  font-weight: 400;
}

H2 {
  background: #fff;
  background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIyOSUiIHN0b3AtY29sb3I9IiNmZmZmZmYiIHN0b3Atb3BhY2l0eT0iMSIvPgogICAgPHN0b3Agb2Zmc2V0PSI2OCUiIHN0b3AtY29sb3I9IiNmNmY2ZjYiIHN0b3Atb3BhY2l0eT0iMSIvPgogICAgPHN0b3Agb2Zmc2V0PSIxMDAlIiBzdG9wLWNvbG9yPSIjZWRlZGVkIiBzdG9wLW9wYWNpdHk9IjEiLz4KICA8L2xpbmVhckdyYWRpZW50PgogIDxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIxIiBoZWlnaHQ9IjEiIGZpbGw9InVybCgjZ3JhZC11Y2dnLWdlbmVyYXRlZCkiIC8+Cjwvc3ZnPg==);
  background: 0;
  background: 0;
  background: 0;
  background: 0;
  background: 0;
  background: linear-gradient(tobottom,#fff29%,#f6f6f668%,#ededed100%);
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff',endColorstr='#ededed',GradientType=0);
  padding-bottom: 3px;
  padding-left: 6px;
  padding-right: 6px;
  background-position: 0 bottom;
  padding-top: 2px;
  border-top-color: #ee3425;
  border-top-width: 1px;
  border-top-style: solid;
  border-bottom-color: #aaa;
  border-bottom-width: 1px;
  border-bottom-style: solid;
  font-size: 13px;
  margin-top: 17px;
}

H2 SPAN {
  font-size: 13px;
}

P {
  margin: 4px 0;
}

H2 .btn_open {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/page_content_8bit.png);
  margin: 0 4px 0 0;
  width: 16px;
  display: inline-block;
  float: right;
  height: 14px;
}

H2 .btn_close {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/page_content_8bit.png);
  margin: 0 4px 0 0;
  width: 16px;
  display: inline-block;
  float: right;
  height: 14px;
}

H2 .btn_open {
  background-position: 0 -90px;
}

H2 .btn_open:hover {
  background-position: 0 -72px;
}

H2 .btn_close {
  background-position: -20px -90px;
}

H2 .btn_close:hover {
  background-position: -20px -72px;
}

.box_area {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/page_content_8bit.png);
}

.box_header {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/page_content_8bit.png);
}

.box_content {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/page_content_8bit.png);
}

.box_footer {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/page_content_8bit.png);
}

.box_header {
  margin: 0;
  height: 5px;
  overflow: hidden;
}

.box_area {
  background-repeat: repeat-y;
}

.box_content {
  padding-bottom: 4px;
  padding-left: 12px;
  padding-right: 12px;
  background-repeat: repeat-y;
  padding-top: 4px;
}

.box_footer {
  margin: 0;
  height: 5px;
  overflow: hidden;
}

.placeholder_1col {
  width: 782px;
  clear: both;
  margin: 0 5px 5px 8px;
}

.placeholder_2col {
  margin: 0 5px 5px 8px;
  width: 385px;
  display: inline;
  float: left;
}

.placeholder_3col {
  margin: 0 16px 0 0;
  width: 250px;
  display: inline;
  float: left;
}

.placeholder_4col {
  margin: 0 16px 0 0;
  width: 170px;
  display: inline;
  float: left;
}

.placeholder_1col .box_header {
  background-position: 0 0;
}

.placeholder_1col .box_area {
  background-position: -782px 0;
}

.placeholder_1col .box_content {
  background-position: -782px 0;
}

.placeholder_1col .box_footer {
  background-position: 0 -6px;
}

.placeholder_2col .box_header {
  background-position: 0 -13px;
}

.placeholder_2col .box_area {
  background-position: -782px 0;
}

.placeholder_2col .box_content {
  background-position: -1564px 0;
}

.placeholder_2col .box_footer {
  background-position: 0 -19px;
}

.placeholder_3col .box_header {
  background-position: 0 -26px;
}

.placeholder_3col .box_area {
  background-position: -782px 0;
}

.placeholder_3col .box_content {
  background-position: -1947px 0;
}

.placeholder_3col .box_footer {
  background-position: 0 -32px;
}

.checkbox label {
  padding: 0 0 0 5px;
}

.widthFlag {
  padding: 3px 5px;
  border-bottom: #aaa 1px solid;
  width: 30px;
}

.widthFlagHeader {
  padding: 3px 5px;
  border-bottom: #bbb 1px solid;
  width: 30px;
  background: #e9e9e9;
  color: #000;
}

.widthSearchHeader {
  width: 175px;
  padding: 3px 5px;
  border-bottom: #bbb 1px solid;
  text-align: left;
  text-transform: uppercase;
  background: #e9e9e9;
  color: #000;
  text-decoration: none;
}

.widthCellHeader {
  padding: 3px 5px;
  border-bottom: #bbb 1px solid;
  text-align: left;
  text-transform: uppercase;
  background: #e9e9e9;
  color: #000;
  text-decoration: none;
}

.widthSearch {
  width: 175px;
  padding: 3px 5px;
  border-bottom: #aaa 1px solid;
  text-decoration: none;
}

.widthCell {
  padding: 3px 5px;
  border-bottom: #aaa 1px solid;
  text-decoration: none;
}

.result_header_neg {
  color: red;
  font-size: large;
}

.result_header_pos {
  color: green;
  font-size: large;
}

.box_content IMG {
  float: left;
}

.error_list {
  padding-left: 50px;
  overflow: auto;
  padding-top: 15px;
}

.left_side_search {
  float: left;
  width: 180px;
  margin-left: 5px;
}

.right_side_search {
  float: left;
  margin-left: 0;
  width: 180px;
  margin-left: 5px;
}

.FARright_side_search {
  width: 300px;
  margin-right: 10px;
}

#loading {
  position: fixed;
  width: 300px;
  top: 249px;
  left: 52%;
  margin-left: -150px;
  text-align: center;
  padding: 7px 0 0;
  font: bold 11px Arial,Helvetica,sans-serif;
}

.Upper {
  text-transform: uppercase;
}

.input_text {
  border: 1px solid silver;
  font: 11px;
  color: #000;
  background-color: #fff;
}

.input_text:focus,input.input_text_focus {
  border-color: #646464;
  background-color: #ffffc0;
}

.CreditsafeCountry {
  background-color: #e30000;
  color: #fff;
}

.CreditsafePartner {
  background-color: #ff6464;
}

.OnlineReportPartners {
  background-color: #8d7e7b;
  color: #fff;
}

.OfflineReportPartners {
  background-color: #ac9baa;
  color: #fff;
}

.popUpDivIntReportDisclaimer {
  font-family: 'Trebuchet MS',Verdana,Arial,Helvetica,sans-serif;
  font-size: 18px;
  position: absolute;
  background-color: #fff;
  border: outset 8px #e20000;
  width: 420px;
  z-index: 9002;
  left: 33%;
  top: 50%;
  padding: 5px;
}

.popUpBody {
  text-align: center;
  padding: 5px;
}

#popUpDiv {
  border: solid 1px #000;
  background-color: #eaf3fb;
  position: absolute;
  z-index: 9002;
}

#popUpDiv h1 {
  margin-top: 0;
  margin-bottom: 4px;
  padding: 2px;
  font-size: 22px;
  color: #fff;
  background-color: #e20000;
}

.GoodCredit {
  color: #2e8b57;
  font-weight: 700;
}

.AverageCredit {
  color: #ccc700;
  font-weight: 700;
}

.BadCredit {
  color: red;
  font-weight: 700;
}

#toTop {
  display: none;
  text-decoration: none;
  position: fixed;
  bottom: 10px;
  right: 10px;
  overflow: hidden;
  width: 51px;
  height: 51px;
  border: none;
  text-indent: -999px;
  background: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/ui.totop.png) no-repeat left top;
}

#toTopHover {
  background: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/ui.totop.png) no-repeat left -51px;
  width: 51px;
  height: 51px;
  display: block;
  overflow: hidden;
  float: left;
  opacity: 0;
  -moz-opacity: 0;
  filter: alpha(opacity=0);
}

#toTop:active,#toTop:focus {
  outline: none;
}

ul,li {
  list-style-type: none;
  padding: 0;
  margin: 0;
  padding-top: 2px;
}

#crumbs {
  width: 540px;
  font-size: 10px;
}

#crumbs li {
  float: left;
  color: #777;
  font-size: 10px;
}

#crumbs li a {
  display: block;
  padding: 0 10px 0 0;
  font-size: 10px;
}

#crumbs li a:link,#crumbs li a:visited {
  color: #777;
  text-decoration: none;
}

a:link,a:visited,#crumbs li a:hover,#crumbs li a:focus {
}

.panel {
  margin-top: 40px;
}

.headsection {
  color: aqua;
}

.guageIndicatorControl {
  width: 114px;
  height: 70px;
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/CSITDashboard-Eng/GuageBackground.gif);
  background-repeat: no-repeat;
}

.guageIndicatorControl .ticLabel {
  width: 114px;
  text-align: center;
  display: block;
  position: relative;
}

.guageIndicatorControl .ticText {
  top: 30px;
  font-size: 12px;
}

.guageIndicatorControl .ticValuePaymentWorsening {
  top: 40px;
  left: -1px;
  width: 22px;
}

.guageIndicatorControl .ticValuePaymentSteady {
  top: -2px;
  left: 46px;
  width: 22px;
}

.guageIndicatorControl .ticValuePaymentImproving {
  top: 40px;
  left: 93px;
  width: 22px;
}

.guageIndicatorControl .ticValueRiskLow {
  top: 40px;
  left: 93px;
  width: 22px;
}

.guageIndicatorControl .ticValueRiskMedium {
  top: -2px;
  left: 46px;
  width: 22px;
}

.guageIndicatorControl .ticValueRiskHigh {
  top: 40px;
  left: -1px;
  width: 22px;
}

.hyperLink {
  color: #e20001;
  cursor: pointer;
}

.editor-row {
  clear: both;
  float: left;
  padding-top: 2px;
  padding-bottom: 2px;
}

.editor-label {
  display: inline;
  width: 180px;
  clear: left;
  float: left;
}

.editor-input {
  display: inline;
  width: 270px;
  float: left;
}

.editor-input input[type=text] {
  width: 250px;
}

.editor-input select {
  width: 150px;
}

.search-button {
  margin-left: 180px;
}

.search-button input[type=submit] {
  width: 100px;
}

.editor-image-info {
  float: left;
}

.editor-image-info img {
  height: 14px;
  vertical-align: central;
}

.question-mark {
  height: 14px;
  vertical-align: middle;
}

.float-right {
  float: right;
}

.float-left {
  float: left;
}

.overview th {
  width: 150px;
  text-align: left;
}

.ucc_details_box {
  background-color: #f5f5f5;
  margin-bottom: 15px;
  float: left;
}

.ucc_details th,.ucc_details td {
  width: 25%;
}

#slidebox {
  width: 400px;
  height: 100px;
  padding: 10px;
  background-color: #fff;
  border: 3px solid #e20000;
  position: fixed;
  bottom: 0;
  right: -430px;
  -moz-box-shadow: -2px 0 5px #aaa;
  -webkit-box-shadow: -2px 0 5px #aaa;
  box-shadow: -2px 0 5px #aaa;
}

#slidebox p,a.more {
  font-size: 13px;
  font-family: Arial;
}

a.more {
  cursor: pointer;
  color: #e20000;
}

a.more:hover {
  text-decoration: underline;
}

a.close {
  background: transparent url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/close.gif) no-repeat top left;
  width: 13px;
  height: 13px;
  position: absolute;
  cursor: pointer;
  top: 10px;
  right: 10px;
}

a.close:hover {
  background-position: 0 -13px;
}

#dialog {
  display: none;
}

.matched {
  font-weight: 700;
}

.field-validation-error,.error-info-box {
  color: red;
}

.alt_row1 {
  border-bottom: #888 2px solid;
  border-top: #888 2px solid;
  text-align: left;
  background: #e7e7e7;
  color: #000;
}

input.greyText {
  color: #aaa;
}

.loader {
  background: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/ajax-loader.gif) no-repeat top left;
  width: 24px;
  height: 24px;
}

.sorting_ASC {
  background: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/ASC.gif) no-repeat top left;
  width: 7px;
  height: 7px;
  position: absolute;
}

.sorting_DESC {
  background: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/DESC.gif) no-repeat top left;
  width: 7px;
  height: 7px;
  position: absolute;
}

#TermsAndConditions iframe {
  width: 99%;
  height: 500px;
  border: none 0;
  margin-top: 10px;
}

#TermsAndConditions form {
  text-align: center;
  margin: 15px 0;
}

#TermsAndConditions form input[type=submit] {
  width: 150px;
  height: 40px;
  border: 1px #000 solid;
  font-size: 120%;
  font-weight: 700;
}

#TermsAndConditions form input.accept {
  background-color: #c3ebc4;
}

#flashMap {
  margin-top: 12px;
}

.GraphInfoHeader {
  width: 50%;
  background-color: #f5f5f5;
  padding: 15px 0 0;
  text-align: center;
}

.GraphInfoHeader span {
  color: #3e576f;
}

.GraphInfoHeader a {
  cursor: pointer;
}

.GraphInfoHeader img {
  float: right;
  padding: 0 5px 3px;
}

.tab_menu .tab_sub_menu div.plain-text-link {
  vertical-align: middle;
  padding: 3px 5px;
}

.tab_menu .tab_sub_menu div.plain-text-link A {
  background-image: none;
  color: red;
}

.tab_menu .tab_sub_menu div.plain-text-link A:hover {
  background-position: 0;
  text-decoration: underline;
}

div.faq {
  width: 770px;
  padding-left: 10px;
}

div.faq h3 {
  margin: 0;
  padding-bottom: 3px;
  font-size: 1.375em;
  padding-top: 15px;
  font-weight: 700;
}

div.faq p {
  padding-left: 20px;
  padding-right: 10px;
  text-align: justify;
}

div.faq p.wider-padding-left {
  padding-left: 29px;
}

div.faq p a {
  color: red;
}

.dbt,.industryDbt,.rating,.legalCount,.creditLimit,.companyStatus {
  background-repeat: no-repeat;
  font-weight: 700;
  text-align: center;
  color: #fff;
  height: 21px;
  padding: 2px 0 0;
  margin: 0;
  float: left;
  font-size: 11px;
}

.dbt,.rating,.companyStatus {
  width: 40px;
}

.legalCount {
  width: 100px;
}

.creditLimit {
  width: 60px;
}

.companyStatus img {
  width: 40%;
  float: none;
}

.dbt.darkGreen,.rating.darkGreen,.companyStatus.green {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/GREENRATINGGroup.png);
}

.dbt.lightGreen,.rating.lightGreen {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/LIGHTGREENRATINGGroup.png);
}

.dbt.yellow,.rating.yellow {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/YELLOWRATINGGroup.png);
}

.dbt.orange,.rating.orange {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/ORANGERATINGGroup.png);
}

.dbt.red,.rating.red,.companyStatus.red {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/REDRATINGGroup.png);
}

.legalCount.green {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/GREENRATINGGroupCourt.png);
}

.legalCount.orange {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/ORANGERATINGGroupCourt.png);
}

.legalCount.red {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/REDRATINGGroupCourt.png);
}

.creditLimit.green {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/GREENRATINGGroupLimitNew.png);
}

.creditLimit.orange {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/ORANGERATINGGroupLimitNew.png);
}

.creditLimit.red {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/redRATINGGroupLimitNew.png);
}

.companyHeader .companyName {
  float: left;
}

.companyHeader .companyNumber {
  float: right;
}

hr.dashboard {
  margin: 8px 0;
}

.placeholder_1col.dashboard {
  height: 120px;
}

.dashboard .indicators {
  width: 525px;
  float: left;
  position: relative;
}

.dashboard .indicators .controlBar {
  padding: 0 0 0 5px;
  height: 30px;
  position: absolute;
  top: 76px;
  left: 106px;
  width: 376px;
}

.dashboard .indicators .controlBar img {
  position: relative;
  top: 0;
  width: 22px;
}

.dashboard .gauges {
  float: right;
}

.dashboard .dbt,.dashboard .industryDbt,.dashboard .creditLimit {
  height: 35px;
  padding: 45px 5px 0 0;
  font-size: 16px;
  width: 95px;
}

.dashboard .dbt.darkGreen {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/CSITDashboard-Eng/GREENDBT.png);
}

.dashboard .dbt.lightGreen {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/CSITDashboard-Eng/LIGHTGREENDBT.png);
}

.dashboard .dbt.yellow {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/CSITDashboard-Eng/YELLOWDBT.png);
}

.dashboard .dbt.orange {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/CSITDashboard-Eng/ORANGEDBT.png);
}

.dashboard .dbt.red {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/CSITDashboard-Eng/REDDBT.png);
}

.dashboard .industryDbt.darkGreen {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/CSITDashboard-Eng/GREENINDUSTRYDBT.png);
}

.dashboard .industryDbt.lightGreen {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/CSITDashboard-Eng/LIGHTGREENINDUSTRYDBT.png);
}

.dashboard .industryDbt.yellow {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/CSITDashboard-Eng/YELLOWINDUSTRYDBT.png);
}

.dashboard .industryDbt.orange {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/CSITDashboard-Eng/ORANGEINDUSTRYDBT.png);
}

.dashboard .industryDbt.red {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/CSITDashboard-Eng/REDINDUSTRYDBT.png);
}

.dashboard .ratingWrapper {
  width: 118px;
  float: left;
}

.dashboard .rating {
  height: 100px;
  width: 480px;
  padding: 15px 0 0 25px;
  font-size: 63px;
  text-align: left;
}

.dashboard .rating.longText {
  font-size: 50px;
  padding: 25px 0 0 15px;
  height: 90px;
  width: 490px;
}

.dashboard .rating.singleText {
  font-size: 50px;
  padding: 25px 0 0 45px;
  height: 90px;
  width: 490px;
}

.dashboard .rating.darkGreen {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/CSITDashboard-Eng/GREENRATINGDASH.png);
}

.dashboard .rating.lightGreen {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/CSITDashboard-Eng/LIGHTGREENRATINGDASH.png);
}

.dashboard .rating.yellow {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/CSITDashboard-Eng/YELLOWRATINGDASH.png);
}

.dashboard .rating.orange {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/CSITDashboard-Eng/ORANGERATINGDASH.png);
}

.dashboard .rating.orange.notRated1 {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/CSITDashboard-Eng/notRated1.png);
}

.dashboard .rating.red {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/CSITDashboard-Eng/REDRATINGDASH.png);
}

.dashboard .rating.red.notRated2 {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/CSITDashboard-Eng/notRated2.png);
}

.dashboard .rating.red.notRated3 {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/CSITDashboard-Eng/notRated3.png);
}

.dashboard .rating.red.notRated4 {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/CSITDashboard-Eng/notRated4.png);
}

.dashboard .legalCount {
  height: 35px;
  width: 130px;
  padding: 45px 10px 0 0;
  font-size: 16px;
}

.dashboard .legalCount.green {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/CSITDashboard-Eng/GREENLEGAL.png);
}

.dashboard .legalCount.orange {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/CSITDashboard-Eng/ORANGELEGAL.png);
}

.dashboard .legalCount.red {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/CSITDashboard-Eng/REDLEGAL.png);
}

.dashboard .creditLimit.green {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/CSITDashboard-Eng/GREENCREDITLIMIT.png);
}

.dashboard .creditLimit.orange {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/CSITDashboard-Eng/ORANGECREDITLIMIT.png);
}

.dashboard .creditLimit.red {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/CSITDashboard-Eng/REDCREDITLIMIT.png);
}

.dashboard .companyStatus {
  width: 50px;
  height: 30px;
  padding: 43px 5px 0 0;
}

.dashboard .companyStatus img {
  width: 24px;
}

.dashboard .companyStatus.green {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/CSITDashboard-Eng/GREENSTATUS.png);
}

.dashboard .companyStatus.red {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/CSITDashboard-Eng/REDSTATUS.png);
}

div.rangeComparisonCtl {
  padding-left: 40px;
}

div.paymExpBarVal {
  width: 335px;
}

img.paymExpBarVal {
  top: 21px;
  position: relative;
}

span.paymExpBarMinVal {
  float: left;
}

span.paymExpBarMaxVal {
  padding-right: 5px;
  float: right;
}

.divider {
  margin: 20px 50px;
  border-top: 1px solid #e20000;
  background-color: #fff;
}

.directorWhite {
  background-color: #fff;
}

.notInSubscription table .field-validation-error {
  width: 70%;
  margin: 1px 0;
}

.notInSubscription table input[type=submit] {
  width: 70px;
  height: 25px;
  font-size: 13px;
}

.notInSubscription table input,.notInSubscription table textarea {
  margin: 2px 0;
}

.notInSubscription table input[type=text] {
  width: 200px;
}

.notInSubscription table textarea {
  width: 250px;
  height: 50px;
}

.notInSubscription .box_area {
  margin: 5px 0;
}

h1.company-report-toolbar {
  float: left;
  width: 100%;
}

h1.company-report-toolbar>span:first-child {
  float: left;
}

h1.company-report-toolbar>span.last-child {
  float: right;
  display: block;
}

h1 a {
  margin-left: 15px;
}

h1 .btn,.btn span,.btn img {
  cursor: pointer;
}

.company-report-toolbar li {
  display: inline-block;
}

.company-report-toolbar li.last-child {
  float: right;
  padding-top: 35px;
}

.notInSubscription .box_area {
  margin: 5px 0;
}

.main-menu-horizontal-separator {
  margin: 8px 0;
  border-top: 1px solid #aaa;
  width: 168px;
}

.sub-tabs {
  margin: 0 5px 5px 8px;
  padding-top: 5px;
}

.sub-tabs .btn,.sub-tabs .btn-red {
  margin-right: 3px;
  margin-top: 5px;
  display: inline-block;
}

.plain-text-link a {
  color: red;
  text-decoration: none;
  font-weight: 700;
}

.float-label {
  display: inline-block;
}

.placeholder_1col {
  padding-top: 0;
}

.mainButton {
  padding: 0;
}

.mainButton A {
  padding: 8px 0;
  display: block;
}

.mainButton A:hover {
  text-decoration: none;
}

.loader {
  background: url(../Contehttp://it.app.creditsafe.com/Staged/ItalyWebsite/Images/running-loader.gif) no-repeat top left;
}

.sorting_ASC {
  background: url(../Contehttp://it.app.creditsafe.com/Staged/ItalyWebsite/Images/ASC.gif) no-repeat top left;
}

.sorting_DESC {
  background: url(../Contehttp://it.app.creditsafe.com/Staged/ItalyWebsite/Images/DESC.gif) no-repeat top left;
}

.tabrow li {
  padding: 0;
}

.tabrow li.selected {
  padding: 0;
}

.tabrow a {
  padding: 0 5px;
  display: block;
}

.tabrow a:Hover {
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: 0;
  background-image: linear-gradient(top,#eff3f5,#d9dde0);
  -webkit-box-shadow: inset 0 1px 0 rgba(255,255,255,.3),inset 0 0 0 1px rgba(255,255,255,.1),0 1px 0 rgba(255,255,255,.7);
  -moz-box-shadow: inset 0 1px 0 rgba(255,255,255,.3),inset 0 0 0 1px rgba(255,255,255,.1),0 1px 0 rgba(255,255,255,.7);
  box-shadow: inset 0 1px 0 rgba(255,255,255,.3),inset 0 0 0 1px rgba(255,255,255,.1),0 1px 0 rgba(255,255,255,.7);
  text-decoration: none;
}

input[type=radio]+label {
  display: inline;
}

.gridview input[type=text],.gridview input[type=datetime],td.debtSuppliers select,td.debtCurrency select,.stripview input[type=text],.stripview input[type=datetime],.stripview select,.gridview select {
  display: block;
  font-size: 12px;
  color: #777;
  background: #f9f9f9;
  width: 280px;
  padding: 3px 10px;
  margin-bottom: 5px;
  border: 1px solid #aaa;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
  -webkit-box-shadow: inset 0 1px 0 rgba(34,25,25,.15),0 1px 0 #fff;
  -moz-box-shadow: inset 0 1px 0 rgba(34,25,25,.15),0 1px 0 #fff;
  box-shadow: inset 0 1px 0 rgba(34,25,25,.15),0 1px 0 #fff;
  -webkit-transition: all .4s linear;
  -moz-transition: all .4s linear;
  -o-transition: all .4s linear;
  transition: all .4s linear;
}

.stripview input[type=text].input-single-small {
  background: none repeat scroll 0 0 #f9f9f9;
  border: 1px solid #aaa;
  border-radius: 4px 4px 4px 4px;
  box-shadow: 0 1px 0 rgba(34,25,25,.15) inset,0 1px 0 #fff;
  color: #777;
  display: inline;
  font-size: 12px;
  margin-bottom: 5px;
  padding: 3px 10px;
  transition: all .4s linear 0;
  width: 80px;
}

#AutoRiskTracker_PortfolioIdWrapper {
  margin-left: 60px;
}

.gridview.portfolioList input {
  width: auto;
}

.gridview.portfolioList input[type=text] {
  width: 120px;
}

.portfolioSearch td input[type=text],.portfolioSearch td select {
  display: block;
  font-size: 12px;
  color: #777;
  background: #f9f9f9;
  width: 170px !important;
  padding: 3px 10px;
  margin-bottom: 5px;
  border: 1px solid #aaa;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
  -webkit-box-shadow: inset 0 1px 0 rgba(34,25,25,.15),0 1px 0 #fff;
  -moz-box-shadow: inset 0 1px 0 rgba(34,25,25,.15),0 1px 0 #fff;
  box-shadow: inset 0 1px 0 rgba(34,25,25,.15),0 1px 0 #fff;
  -webkit-transition: all .4s linear;
  -moz-transition: all .4s linear;
  -o-transition: all .4s linear;
  transition: all .4s linear;
}

.inline {
  display: inline;
}

.header .logo_box {
  height: 0;
  width: 0;
  margin: 15px;
  padding: 35px 120px;
}

.btn,.btn-find,.btn-grn,.btn-red {
  cursor: pointer;
}

.none-uppercase {
  text-transform: none !important;
}

#country_select,#country_select option {
  text-transform: uppercase;
}

span.risk_band {
  background: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/risk_prov_backgrounds.png);
  width: 100px;
  height: 75px;
  display: inline-block;
}

.risk_band.A {
  background-position: -0 -0;
}

.risk_band.B {
  background-position: -147px 0;
}

.risk_band.C {
  background-position: -292px 0;
}

.risk_band.D {
  background-position: -581px 0;
}

.risk_band.E {
  background-position: -581px 0;
}

.risk_band.X {
  background-position: -581px 0;
}

span.provisional_limit {
  background: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/risk_prov_backgrounds.png);
  width: 145px;
  height: 75px;
  display: inline-block;
}

.provisional_limit.A {
  background-position: -2px 84px;
}

.provisional_limit.B {
  background-position: -148px 84px;
}

.provisional_limit.C {
  background-position: -291px 84px;
}

.provisional_limit.D {
  background-position: -580px 84px;
}

.provisional_limit.E {
  background-position: -580px 84px;
}

.provisional_limit.X {
  background-position: -580px 84px;
}

span.risk_indication {
  font-size: 13px;
  display: block;
  text-align: center;
  font-weight: 700;
}

span.risk_indication_value {
  font-size: 18px;
}

span.white {
  color: #fff;
  font-size: 14px;
  margin: 16px 0 0;
}

span.black {
  color: #5b5757;
  margin: 18px 0 0 4px;
}

.gridview.pagination {
  margin-bottom: 10px;
}

.gridview.pagination td {
  padding-top: 5px;
  padding-bottom: 5px;
}

.box_area.company-search {
  margin-top: 10px;
}

#recentActivityGrid .pagination {
  width: 50%;
  float: left;
}

#recentActivityGrid .pagination td {
  padding-left: 10px;
  height: 23px;
}

#recentActivityGrid table td {
  padding: 2px 3px;
}

#csvExport {
  float: right;
  width: 50%;
}

#csvExport td {
  height: 23px;
  text-align: right;
  padding-right: 10px !important;
}

#csvExport td a {
  text-decoration: none;
}

#csvExport td a img {
  margin-left: 3px;
  width: 18px;
  vertical-align: bottom;
  border: none;
}

#csvExport.no-pager {
  width: 100%;
}

.risk_band-cell {
  text-align: center;
}

td.risk_band-cell span.black {
  display: none;
}

td.risk_band-cell span.risk_band {
  height: 41px;
}

td.risk_band-cell .risk_band.A {
  background-position: 6px -39px;
}

td.risk_band-cell .risk_band.B {
  background-position: -139px -39px;
}

td.risk_band-cell .risk_band.C {
  background-position: -284px -39px;
}

td.risk_band-cell .risk_band.D {
  background-position: -428px -39px;
}

td.risk_band-cell .risk_band.E {
  background-position: -573px -39px;
}

td.risk_band-cell .risk_band.X {
  background-position: -573px -39px;
}

td.risk_band-cell span.risk_indication_value {
  margin-top: 6px;
}

td div.rating {
  width: 70px;
  height: 15px;
  color: #f5faef;
  font-weight: 700;
  letter-spacing: normal;
  padding: 2px 5px;
  text-align: center;
  text-decoration: none;
}

td div.ratingA,td div.ratingActive {
  background-color: #358c2b;
  background-image: 0;
}

td div.ratingB {
  background-color: #f4af12;
  background-image: 0;
}

td div.ratingC {
  background-color: #f4af12;
  background-image: 0;
}

td div.ratingD {
  background-color: #c4291d;
  background-image: 0;
}

td div.ratingE,td div.ratingInactive {
  background-color: #c4291d;
  background-image: 0;
}

td div.ratingX {
  background-color: #c4291d;
  background-image: 0;
}

.clear {
  clear: both;
  width: 100%;
}

.footer_content {
  text-align: center;
  height: 40px;
}

#openerPrint {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/mail-save-print.png);
  background-repeat: no-repeat;
  background-position: center center;
  display: inline-block;
  height: 15px;
  width: 50px;
  margin: 0 15px;
}

#dialog label {
  display: inline;
}

#dialog td {
  height: 20px;
  vertical-align: middle;
}

#dialog .buttons_panel {
  margin: 10px 0;
}

#emailForm input[type=text] {
  height: 1.3em;
  width: 200px;
}

#emailForm td {
  padding: 2px 0;
}

#emailForm input[type=submit],#emailForm input[type=button] {
  width: 95px;
  height: 25px;
}

#emailForm tr>td:first-child {
  width: 170px;
}

.chart-data {
  display: none;
}

.charts {
  height: 190px;
}

.pie-part-color-amber {
  color: #f4af12;
}

.pie-part-color-red,.pie-part-color-cancelled {
  color: #c4291d;
}

.pie-part-color-green,.pie-part-color-active {
  color: #358c2b;
}

table.possibleLinksContainer {
  width: 100%;
}

.possibleLinksContainer td.legendContainer {
  width: 55%;
  vertical-align: top;
}

.possibleLinksContainer td.chartContainer {
  width: 45%;
}

.possibleLinksContainer #piePossibleLinks {
  height: 300px;
}

TABLE.stripview td.piechart_legend {
  border: 2px solid #f5f5f5;
  height: 2px;
  width: 4px;
}

td.match1 {
  background-color: #4572a7;
}

td.match2 {
  background-color: #aa4643;
}

td.match3 {
  background-color: #89a54e;
}

td.match4 {
  background-color: #80699b;
}

td.match5 {
  background-color: #3d96ae;
}

td.match6 {
  background-color: #db843d;
}

td.match7 {
  background-color: #92a8cd;
}

td.match8 {
  background-color: #a47d7c;
}

td.matchinternational {
  background-color: #b5ca92;
}

.gridview tr td label {
  display: inline;
}

ul.industry-inforamtion li {
  width: 50%;
  display: inline-block;
  float: left;
  background-color: #f5f5f5;
  overflow: hidden;
}

ul.industry-inforamtion li div {
  padding-top: 5px;
}

ul.industry-inforamtion li h3 {
  border-bottom: #bbb 1px solid;
  text-align: left;
  text-transform: uppercase;
  background: #e9e9e9;
  color: #000;
  font-size: 12px;
  font-weight: 700;
  padding: 5px 0 0 6px;
  vertical-align: top;
  height: 30px;
}

.invoice-information h4 {
  padding-bottom: 3px;
}

.invoice-information:last-child {
  margin-top: 15px;
}

.invoice-information:last-child span:last-child {
  margin-top: 15px;
}

.invoice-information span {
  display: block;
}

.ui-datepicker-trigger {
  border: 0;
}

.Hidden {
  display: none;
}

.datePickerInfo {
  text-align: center;
  font-weight: 700;
  background: #eee;
}

.contactus-btn {
  margin: 5px 10px;
}

div.placeholder_1col h2.possibleLinks {
  border-top: 1px solid #c4291d;
  margin-top: 23px;
  padding: 2px 6px 3px;
}

iframe {
  width: 100%;
  min-height: 200px;
  border: none;
}

iframe.cmslinks {
  display: block;
}

iframe.debtscore {
  height: 240px;
}

#MediaResult,#DirectorMediaSolutions {
  position: relative;
}

.transparentLoad {
  zoom: 1;
  filter: alpha(opacity=50);
  opacity: .2;
}

.mediasolutionsLoader {
  position: absolute;
  top: 40%;
  left: 50%;
  background: url(../Contehttp://it.app.creditsafe.com/Staged/ItalyWebsite/Images/ajax-loader-big.gif) no-repeat top left;
  width: 48px;
  height: 48px;
  display: none;
}

#MediaAdvancedResults h2 .loader {
  width: 16px;
  height: 16px;
  display: none;
  float: right;
  padding: 10px;
}

.floatright {
  float: right;
}

table.media-solutions-summary td {
  padding: 10px 0 10px 30px;
  background: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/grey-globe-icon.png) no-repeat left center;
}

table.media-solutions-summary td.Risk {
  background: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/alert-square-blue.png) no-repeat left center;
}

table.media-solutions-summary td.Exact {
  background: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/newspapers-blue.png) no-repeat left center;
}

table.media-solutions-summary td.Staff {
  background: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/user-grey.png) no-repeat left center;
}

table.media-solutions-summary td.Oprational {
  background: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/tag-blue.png) no-repeat left center;
}

.contact-us #map_canvas {
  width: 550px;
  height: 270px;
  float: right;
}

.pay-my-invoice #map_canvas {
  width: 250px;
  height: 270px;
  float: right;
  border: 1px solid #aaa;
}

.pay-my-invoice .gridview tr,.contact-us .gridview tr {
  height: 300px;
}

.contact-us .gridview tr td {
  vertical-align: top;
}

.email-info {
  font-weight: 700;
  font-size: 14px;
}

.profile .stripview th {
  text-align: left;
}

.profile .stripview th:first-child {
  width: 150px;
}

.official-comapny-name {
  margin-bottom: 5px;
}

.official-comapny-name span {
  display: block;
  font-weight: 700;
  text-transform: capitalize;
}

textarea.contact-us-message {
  width: 600px;
  height: 200px;
  resize: none;
}

.risk_band_user_activity {
  background: #c4291d;
}

.risk_band_user_activity.A {
  background: #358c2b;
}

.risk_band_user_activity.B {
  background: #29bc0e;
}

.risk_band_user_activity.C {
  background: #f4af12;
}

.risk_band_user_activity.D {
  background: #e6510a;
}

.risk_band_user_activity span {
  padding: 7px 20px;
  font-weight: 700;
  font-size: 12px;
}

.company-email-address {
  text-transform: lowercase;
}

.breadcrumbs {
  width: 600px;
  height: 18px;
  margin: 0 0 0 200px;
  bottom: 0;
  position: absolute;
}

.breadcrumbs a {
  font-size: 11px;
  color: #777;
  text-decoration: none;
  padding: 0 15px 0 0;
}

.breadcrumbs .partialNodes {
  background: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/breadcrumb_arrow.gif) no-repeat right center;
}

.gridview .NegativeArrow {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/arrow-down-red-commentry.png);
  background-repeat: no-repeat;
  background-position: center;
}

.gridview .NeutralArrow {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/arrow-right-amber-commentry.png);
  background-repeat: no-repeat;
  background-position: center;
}

.gridview .PositiveArrow {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/arrow-up-green-commentry.png);
  background-repeat: no-repeat;
  background-position: center;
}

table.cleaningGrid {
  table-layout: fixed;
}

.cleaningGrid textarea {
  height: 100px;
}

.cleaningGrid TH {
  width: 25% !important;
}

.cleaningGrid TD {
  width: 75% !important;
}

.data-clean-email-sent {
  font-weight: 700;
  font-size: 14px;
}

.groupRedRating {
  background-color: #c4291d;
  text-align: center;
  position: relative;
  color: #fff;
  font-weight: 700;
  width: 90%;
  height: 90%;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
}

.groupAmberRating {
  background-color: #f4af12;
  text-align: center;
  position: relative;
  color: #fff;
  font-weight: 700;
  width: 90%;
  height: 90%;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
}

.groupGreenRating {
  background-color: #358c2b;
  text-align: center;
  position: relative;
  color: #fff;
  font-weight: 700;
  width: 90%;
  height: 90%;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
}

.groupRedRating div {
  line-height: 18px;
}

.groupAmberRating div {
  line-height: 18px;
}

.groupGreenRating div {
  line-height: 18px;
}

.parentConvolutedGroupImg {
  height: 19px;
  width: 20px;
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/tplus.gif);
  background-repeat: no-repeat;
  float: left;
}

.parentExpandedGroupImg {
  height: 19px;
  width: 20px;
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/tminus.gif);
  background-repeat: no-repeat;
  float: left;
}

.lastChildGroupImg {
  height: 19px;
  width: 20px;
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/L.gif);
  background-repeat: no-repeat;
  float: left;
}

.childGroupImg {
  height: 19px;
  width: 20px;
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/T.gif);
  background-repeat: no-repeat;
  float: left;
}

#loadingIcon {
  display: none;
  width: 30px;
  height: 30px;
  position: absolute;
  right: 0;
  top: 5px;
}

.dashboard-it {
  float: left;
  position: relative;
  margin-top: 5px;
}

.dashboard-it .rating-it {
  width: 118px;
  float: left;
}

.dashboard-it .rating-it span {
  display: block;
  text-align: center;
  width: 97px;
  font-size: 55px;
  margin-left: -6px;
}

.recentActivity .rating-it .RatingMain {
  background-image: none;
  color: #000;
  width: auto;
  height: auto;
  font-weight: 400;
  padding: 0;
  text-align: center;
}

.recentActivity .rating-it .RatingMain .hideable {
  display: none;
}

.dashboard-it .limit-it,.dashboard-it .purchase-it,.dashboard-it .protesti-it,.dashboard-it .status-it {
  width: 100px;
  float: left;
}

.dashboard-it .protesti-amount-it {
  width: 140px;
  float: left;
}

.dashboard-it .status-it .Active,.dashboard-it .status-it .Inactive {
  background: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/risk_prov_backgrounds.png);
  width: 100px;
  height: 75px;
  display: inline-block;
}

.dashboard-it .status-it .Active {
  background-position: 0 0;
}

.dashboard-it .status-it .Inactive {
  background-position: -573px 0;
}

.dashboard-it .status-it .Active:after {
  content: "";
  padding: 12px;
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/ok-grey.png);
  background-repeat: no-repeat;
  background-position: center center;
}

.dashboard-it .status-it .Inactive:after {
  content: "";
  padding: 12px;
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/ko-grey.png);
  background-repeat: no-repeat;
  background-position: center center;
}

.dashboard-it .rating-arrow-it {
  left: 106px;
  top: 76px;
  width: 540px;
  height: 30px;
  padding: 0 0 0 5px;
  position: absolute;
}

.dashboard-it .rating-arrow-it img {
  top: 0;
  position: relative;
  width: 22px;
}

div.reportMap {
  z-index: 100;
  width: 400px;
  height: 246px;
  float: right;
  border: 3px solid #aaa;
}

table.gridview td.multiLabels label {
  margin: 8px;
}

div.ratingBar {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/rating_bar.png);
  margin-left: 6px;
  width: 300px;
  height: 30px;
}

div.ratingControl {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/rating_control.png);
  width: 28px;
  height: 26px;
  position: relative;
  z-index: 1;
  margin-top: -27px;
}

.last-chart {
  width: 100% !important;
}

.last-chart div {
  height: 240px !important;
}

.detailed-report-dialog .ui-dialog-titlebar-close,.detailed-report-dialog .ui-dialog-titlebar {
  display: none !important;
}

#dialog-message {
  display: none;
  padding: 10px 0;
  text-align: center;
}

#dialog-message div {
  text-transform: uppercase;
  font-size: 15px;
  border: #bbb 1px solid;
  background: #f6f6f6;
}

.gridview.financials .title_bar th,.gridview.financials tr td {
  text-align: right;
}

.gridview.financials .title_bar th:first-child {
  text-align: left;
}

.gridview.financials .title_bar th:nth-child(3),.gridview.financials tr td:nth-child(3) {
  width: 10%;
}

.gridview.financials .title_bar th:nth-child(2),.gridview.financials .title_bar th:nth-child(4),.gridview.financials tr td:nth-child(2),.gridview.financials tr td:nth-child(4) {
  width: 15%;
}

.excelExport {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/ExcellExport.png);
  background-repeat: no-repeat;
  width: 25px;
  height: 19px;
  position: absolute;
  margin-top: -2px;
}

.excelExportAnchor {
  display: block;
  width: 70px;
  height: 20px;
  float: right;
}

.red {
  color: red;
}

.green {
  color: green;
}

tr.Header {
  border-bottom: #bbb 1px solid;
  text-align: left;
  background: #e9e9e9;
  color: #000;
  font-size: 12px;
  font-weight: 700;
}

tr.Header th,tr.Header td,tr.Total th,tr.Total td {
  background: #e9e9e9;
  text-transform: uppercase;
}

tr.Header td span {
  visibility: hidden;
}

tr.Indent th {
  padding-left: 20px;
}

.tabBox {
  position: relative;
}

.box_area.protesti-summary {
  margin-top: 10px;
}

.box_area.protesti-summary+h2 {
  margin-top: 5px;
}

.protesti-summary label {
  margin: 3px 0 !important;
}

.protesti-summary tr th {
  width: 33%;
}

.protesti-details th {
  width: 25%;
  padding: 3px 6px !important;
}

.protesti-details td {
  width: 25%;
  vertical-align: top;
  padding: 3px 6px !important;
}

.arbitrary-division-line {
  margin: 10px 50px;
  border-bottom: 1px solid #aaa;
}

.isHighlighted,.isHighlighted td {
  background-color: #edf3f8 !important;
}

.color-square {
  width: 15px;
  height: 15px;
  display: inline-block;
  vertical-align: middle;
  margin-right: 5px;
}

.color-square.A {
  background-color: #358c2b;
}

.color-square.B {
  background-color: #29bc0e;
}

.color-square.C {
  background-color: #f4af12;
}

.color-square.D {
  background-color: #e6520c;
}

.color-square.E {
  background-color: #c4291d;
}

.color-square.X {
  background-color: #c4291d;
}

#containerRatingHistory,#containerLimitHistory {
  height: 120px !important;
}

.inputs-row input.single-line {
  width: 200px !important;
}

td input[type=text].disabled {
  background: #e2e9ea;
}

#MediaSerachReset {
  position: absolute;
  bottom: 0;
  left: 80px;
}

.HasProtesti .true {
  background: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/redtick.png) no-repeat left center;
  padding: 8px 10px;
}

.HasProtesti .false {
  background: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/xgree.png) no-repeat left center;
  padding: 8px 10px;
}

#map_canvas {
  z-index: 1;
}

.tabrow ul {
  z-index: 1000;
}

.RatingMain.X {
  background-image: url(http://it.app.creditsafe.com/Staged/ItalyWebsite/Images/CSITDashboard-Eng/notrated.png);
}

span.negative-rating-description {
  padding: 4px 10px 3px;
  display: block;
  letter-spacing: 1px;
}

#myUsageStats #DateFrom,#myUsageStats #DateTo,#myUsageRowInvestigations #DateFrom,#myUsageRowInvestigations #DateTo {
  width: 150px;
  float: left;
}

#myUsageStats .right {
  float: right;
}

.error {
  color: red;
  font-weight: 700;
}

div.placeholder_1col.directors-shareholders {
  background: #f5f5f5;
}

.divider:last-child {
  display: none;
}

h2.position {
  margin-top: 0;
  border-top: 1px solid #fff;
}

h2.directorship {
  margin-top: 0;
  border-top: 1px solid #fff;
}

.width50 {
  width: 50%;
}

.directors-shareholders .gridview tr th {
  width: 250px;
}

.directors-shareholders .gridview tr td {
  padding-left: 0;
}


.key-financials th:first-child {
  width: 40%;
}

.key-financials th {
  width: 20%;
}

.language-chooser form {
  display: inline;
  height: 11px;
}

.language-chooser input {
  border: 0 none;
  height: 11px;
  cursor: pointer;
}

.rating-and-limit table th,.rating-and-limit table td {
  width: 25%;
}

.rating-and-limit .rating-it,.rating-and-limit .limit-it,.rating-and-limit .purchase-it {
  display: inline-block;
}

.rating-and-limit .rating-it .RatingMain,.rating-and-limit .limit-it,.rating-and-limit .purchase-it {
  background-image: none;
  width: auto;
  height: auto;
  padding: 0;
  color: inherit;
}

.rating-and-limit .rating-it .hideable {
  display: none;
}

.rating-and-limit .limit-it span,.rating-and-limit .rating-it span,.rating-and-limit .purchase-it span {
  color: inherit;
  margin: 0;
  font-size: inherit;
  vertical-align: middle;
}

.rating-and-limit .limit-it span:first-child,.rating-and-limit .purchase-it span:first-child {
  display: none;
}

.rating-and-limit .risk-assessment .hideable {
  display: block;
}

.rating-and-limit .risk-assessment .rating-it span:first-child {
  display: none;
}
.Power td{
height: 100%;
overflow: hidden;
display: block;
}
.read-more{
	cursor: pointer;
}
.read-more td,.read-more th {
  border-bottom: none;
  
}
:after, :before {
    box-sizing: border-box;
}

body{
  padding:20px
}


a {
    color: #337ab7;
    text-decoration: none;
}
i{
  margin-bottom:4px;
}

.btn {
    display: inline-block;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    cursor: pointer;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
}


.btn-app {
    color: white;
    box-shadow: none;
    border-radius: 3px;
    position: relative;
    padding: 10px 15px;
    margin: 0;
    min-width: 60px;
    max-width: 80px;
    text-align: center;
    border: 1px solid #ddd;
    background-color: #f4f4f4;
    font-size: 12px;
    transition: all .2s;
    background-color: steelblue !important;
}

.btn-app > .fa, .btn-app > .glyphicon, .btn-app > .ion {
    font-size: 30px;
    display: block;
}

.btn-app:hover {
    border-color: #aaa;
    transform: scale(1.1);
}

button.dt-button, div.dt-button, a.dt-button {
  background-image:none;
  color:white;
}

.pdf {
  background-color: #dc2f2f !important;
}

.excel{
    background-color: #3ca23c !important;
}

.csv {
    background-color: #e86c3a !important;
}

.imprimir {
    background-color: #8766b1 !important;
}

/*
Esto es opcional pero sirve para que todos los botones de exportacion se distribuyan de manera equitativa usando flexbox

.flexcontent {
    display: flex;
    justify-content: space-around;
}
*/

.selectTable{
  height:40px;
  float:right;
  
}

div.dataTables_wrapper div.dataTables_filter {
    text-align: left;
    margin-top: 15px;
}

.btn-secondary {
    color: #fff;
    background-color: #4682b4;
    border-color: #4682b4;
}
.btn-secondary:hover {
    color: #fff;
    background-color: #315f86;
    border-color: #545b62;
}



.titulo-tabla{
  color:#606263;
  text-align:center;
  margin-top:15px;
  margin-bottom:15px;
  font-weight:bold;
}






.inline{
  display:inline-block;
  padding:0;
}



button.dt-button:hover:not(.disabled), div.dt-button:hover:not(.disabled), a.dt-button:hover:not(.disabled) {
    
    background-color: no;
    background-image: none;
    filter: none;
}

button.dt-button, div.dt-button, a.dt-button {
  background-color:steelblue;
  border:none;
}

button.dt-button:hover:not(.disabled), div.dt-button:hover:not(.disabled), a.dt-button:hover:not(.disabled) {
  
  background-color: steelblue;
}

div.dt-button-collection {
padding:0;
background-color:steelblue;
}


button.dt-button:active:not(.disabled), button.dt-button.active:not(.disabled), div.dt-button:active:not(.disabled), div.dt-button.active:not(.disabled), a.dt-button:active:not(.disabled), a.dt-button.active:not(.disabled) {
  background-color:steelblue;
  background-image:none;
}




div.dt-button-collection button.dt-button, div.dt-button-collection div.dt-button, div.dt-button-collection a.dt-button {
  margin-bottom:0;
  border:none;
}

div.dt-button-collection button.dt-button:active:not(.disabled), div.dt-button-collection button.dt-button.active:not(.disabled), div.dt-button-collection div.dt-button:active:not(.disabled), div.dt-button-collection div.dt-button.active:not(.disabled), div.dt-button-collection a.dt-button:active:not(.disabled), div.dt-button-collection a.dt-button.active:not(.disabled) {
  background-image:none;
  background-color: rgba(0,0,0,0.3)
  
}


div.dt-button-collection button.dt-button:active:not(.disabled), div.dt-button-collection button.dt-button.active:not(.disabled), div.dt-button-collection div.dt-button:active:not(.disabled), div.dt-button-collection div.dt-button.active:not(.disabled), div.dt-button-collection a.dt-button:active:not(.disabled), div.dt-button-collection a.dt-button.active:not(.disabled) {
  border:none;
  
}


button.dt-button:hover:not(.disabled), div.dt-button:hover:not(.disabled), a.dt-button:hover:not(.disabled) {
  border:none;
  background-color: #3b72a0;
}





button.dt-button:active:not(.disabled):hover:not(.disabled), button.dt-button.active:not(.disabled):hover:not(.disabled), div.dt-button:active:not(.disabled):hover:not(.disabled), div.dt-button.active:not(.disabled):hover:not(.disabled), a.dt-button:active:not(.disabled):hover:not(.disabled), a.dt-button.active:not(.disabled):hover:not(.disabled) {
    box-shadow: none;
    background-color: rgba(0,0,0,0.3);
    background-image: none;
    filter: none;
}

button.dt-button:focus:not(.disabled), div.dt-button:focus:not(.disabled), a.dt-button:focus:not(.disabled) {
    border: 1px solid #426c9e;
    text-shadow: 0 1px 0 #c4def1;
    outline: none;
    background-color: steelblue;
    background-image: none;
    filter:none;
}

.dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
    color: white !important;
    border: 1px solid #979797;
    background: none;
    background-color: steelblue;
    
}














.dataTables_wrapper .dataTables_paginate .paginate_button:active {
    outline: none;
    background: none;
    background-color: #2e5475;
    box-shadow: inset 0 0 3px #111;
}





.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
    color: white !important;
    border: 1px solid #111;
    background: none;
    background-color: #2e5475;
    
}
    </style>

  <div class="container mt-12">
                  <div class="col-md-12">
<div  class="placeholder_1col directors-shareholders">
  <br>
  <br>
  <br>
    <center><h1>Estado de Resultados</h1></center>
    <center> <input></center>
<br>
<center> <label>Al
    <select  >
        <option selected disabled>Dia</option>
        <option  >1</option>
        <option  >2</option>
        <option  >3</option>
        <option  >4</option>
        <option  >6</option>
        <option  >7</option>
        <option  >8</option>
        <option  >9</option>
        <option  >10</option>
        <option  >11</option>
        <option  >12</option>
        <option  >13</option>
        <option  >14</option>
        <option  >16</option>
        <option  >17</option>
        <option  >18</option>
        <option  >19</option>
        <option  >20</option>
        <option  >21</option>
        <option  >22</option>
        <option  >23</option>
        <option  >24</option>
        <option  >26</option>
        <option  >27</option>
        <option  >28</option>
        <option  >29</option>
        <option  >30</option>
        <option  >31</option>

        
        </select>
        de
        <select  >
            <option selected disabled>Mes</option>
            <option  >Enero</option>
            <option  >Febrero</option>
            <option  >Marzo</option>
            <option  >Abril</option>
            <option  >Mayo</option>
            <option  >Junio</option>
            <option  >Julio</option>
            <option  >Agosto</option>
            <option  >Septiembre</option>
            <option  >Octubre</option>
            <option  >Noviembre</option>
            <option  >Diciembre</option>
            
            
            </select>
            del
            <input  id="año">
            
        </label></center>
    <?php

include('../conexion.php');

$cliente=$_SESSION['cliente'];
$fechai=$_SESSION['fechai'];
$fechaf=$_SESSION['fechaf'];
$Utilidad_Bruta = 0 ;
$Total_Gastos= 0;
$Utilidad_Op= 0;
$UAI = 0;
$Utilidad_Neta = 0;

//where ID_LIBRO_MAYOR='$ID_LIBRO' and ID_CLIENTE='$ID_CLIENTE'
$consulta=mysqli_query($conn,"SELECT Monto FROM libro2 where  Id_Cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And Cuenta = 'Venta';" );
              while($row=mysqli_fetch_array($consulta)){
                  $Venta = ['Monto'];
                  
  ?>
                 
                 <th><?php $Venta=$row['Monto']?></th>
                 
              <?php
                }
                
            if(empty($Venta)){
              $Venta = 0;
            }
                ?>
              <?php
 $consulta=mysqli_query($conn,"SELECT Monto FROM libro2 where  Id_Cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And Cuenta = 'Costo de venta';" );
 while($row=mysqli_fetch_array($consulta)){
     $costo = ['Monto'];
     
?>
    
    <th><?php $costo=$row['Monto']?></th>
    
 <?php
   }
   
if(empty($costo)){
  $costo = 0;
}
   ?>

            <?php
 $consulta=mysqli_query($conn,"SELECT Monto FROM libro2 where  Id_Cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And Cuenta = 'Gastos de venta';" );
 while($row=mysqli_fetch_array($consulta)){
     $GV = ['Monto'];
     
?>
    
    <th><?php $GV=$row['Monto']?></th>
    
 <?php
   }
   
if(empty($GV)){
  $GV = 0;
}
   ?>
            <?php
 $consulta=mysqli_query($conn,"SELECT Monto FROM libro2 where  Id_Cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And Cuenta = 'Gastos de administracion';" );
 while($row=mysqli_fetch_array($consulta)){
     $GA = ['Monto'];
     
?>
    
    <th><?php $GA=$row['Monto']?></th>
    
 <?php
   }
   
if(empty($GA)){
  $GA = 0;
}
   ?>
            <?php
 $consulta=mysqli_query($conn,"SELECT Monto FROM libro2 where  Id_Cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And Cuenta = 'Gastos financieros';" );
 while($row=mysqli_fetch_array($consulta)){
     $GF = ['Monto'];
     
?>
    
    <th><?php $GF=$row['Monto']?></th>
    
 <?php
   }
   
if(empty($GF)){
  $GF = 0;
}
   ?>
            <?php
 $consulta=mysqli_query($conn,"SELECT Monto FROM libro2 where  Id_Cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And Cuenta = 'Otros ingresos';" );
 while($row=mysqli_fetch_array($consulta)){
     $OI = ['Monto'];
     
?>
    
    <th><?php $OI=$row['Monto']?></th>
    
 <?php
   }
   
if(empty($OI)){
  $OI = 0;
}
   ?>
            <?php
 $consulta=mysqli_query($conn,"SELECT Monto FROM libro2 where  Id_Cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And Cuenta = 'Otros Gastos';" );
 while($row=mysqli_fetch_array($consulta)){
     $OG = ['Monto'];
     
?>
    
    <th><?php $OG=$row['Monto']?></th>
    
 <?php
   }
   
if(empty($OG)){
  $OG = 0;
}
   ?>
    <?php
 $consulta=mysqli_query($conn,"SELECT Monto FROM libro2 where  Id_Cliente = $cliente AND fecha >='$fechai' and fecha <='$fechaf' And Cuenta = 'Impuesto';" );
 while($row=mysqli_fetch_array($consulta)){
     $Imp = ['Monto'];
     
?>
    
    <th><?php $Imp=$row['Monto']?></th>
    
 <?php
   }
   
if(empty($Imp)){
  $Imp = 0;
}
   ?>

<?php
            $Utilidad_Bruta = $Venta- $costo ;
            $Total_Gastos= $GV + $GA + $GF;
            $Utilidad_Op= $Utilidad_Bruta - $Total_Gastos;
            $UAI = $Utilidad_Op - $OG +$OI;
            $Utilidad_Neta = $UAI + $Imp;
            ?>
           

<table id="ejemplo" class="gridview">

    <tbody><tr class=""><th><label for="companyDirectorModel_Forename" >Ventas</label></th><td class=""><?php echo $Venta; ?></td></tr>
    <tr class="Surname"><th><label for="companyDirectorModel_Surname">Costo de ventas</label></th><td class=""><?php echo $costo; ?></tr>
      <tr class="title_row"><th><label for="companyDirectorModel_Gender"></label>Utilidad Bruta</th><td class=""><?php echo $Utilidad_Bruta; ?></td></tr>
      <br>
    <tr class="title_row">
      <th colspan="1">Gasto de Operacion</th>
    </tr>
    <br>
    <tr class="TaxCode"><th><label for="companyDirectorModel_TaxCode">Gastos de venta</label></th><td class=""><?php echo $GV; ?></td></tr>
    <tr class="Gender"><th><label for="companyDirectorModel_Gender"></label>Gastos de Administracion</th><td class=""><?php echo $GA; ?></td></tr>
    <tr class="Gender"><th><label for="companyDirectorModel_Gender"></label>Gastos Financieros</th><td class=""><?php echo $GF; ?></td></tr>
    <tr class="Gender"><th><label for="companyDirectorModel_Gender"></label>Total Gastos Operacion</th><td class=""><?php echo $Total_Gastos; ?></td></tr>
    <br>
    <tr class="title_row"><th><label for="companyDirectorModel_Gender"></label>Utilidad de Operacion</th><td class=""><?php echo $Utilidad_Op; ?></td></tr>
    <br>
    <tr class="Gender"><th><label for="companyDirectorModel_Gender"></label>Otros Ingresos</th><td class=""><?php echo $OI; ?></td></tr>
    <tr class="Gender"><th><label for="companyDirectorModel_Gender"></label>Otros Gastos</th><td class=""><?php echo $OG; ?></td></tr>
    <br>
    <tr class="title_row"><th><label for="companyDirectorModel_Gender"></label>Utilidad antes de impuesto</th><td class=""><?php echo $UAI; ?></td></tr>
    <tr class="Gender"><th><label for="companyDirectorModel_Gender"></label>impuesto</th><td class=""><?php echo $Imp; ?></td></tr>
    <tr class="title_row">
 <th ><label for="companyDirectorModel_Gender"></label>Utilidad Neta</th><td class=""><?php echo $Utilidad_Neta; ?></td></tr>

</tbody></table>

<br>
<?php
  include('../conexion.php');
  $query_insert = mysqli_query($conn,"INSERT INTO TBL_ESTADO_RESULTADO(Id_Cliente,Utilida_Bruta,Total_Gasto,Utilidad_Operacion,Utilidad_Antes_Impu,Utilidad_Neta)
                        VALUES('$cliente','$Utilidad_Bruta','$Total_Gastos','$Utilidad_Op','$UAI','$Utilidad_Neta')");
?>

</body>
</html>

