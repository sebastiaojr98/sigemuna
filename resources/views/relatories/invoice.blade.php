<!DOCTYPE html>
<html class="no-js" lang="pt">

<head>
  <!-- Meta Tags -->
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Laralink">
  <!-- Site Title -->
  <title>Factura - {{$revenue->reference}}</title>
  <style>
        *,
      ::after,
      ::before {
        -webkit-box-sizing: border-box;
                box-sizing: border-box;
      }

      html {
        line-height: 1.15;
        -webkit-text-size-adjust: 100%;
      }

      body {
        margin: 0;
      }
      main {
        display: block;
      }

      h1 {
        font-size: 2em;
        margin: 0.67em 0;
      }

      hr {
        -webkit-box-sizing: content-box;
                box-sizing: content-box; /* 1 */
        height: 0; /* 1 */
        overflow: visible; /* 2 */
      }

      pre {
        font-family: monospace, monospace; /* 1 */
        font-size: 1em; /* 2 */
      }
      a {
        0, 0, 0-color: transparent;
      }

      abbr[title] {
        border-bottom: none; /* 1 */
        text-decoration: underline; /* 2 */
        -webkit-text-decoration: underline dotted;
                text-decoration: underline dotted; /* 2 */
      }

      b,
      strong {
        font-weight: bolder;
      }

      code,
      kbd,
      samp {
        font-family: monospace, monospace; /* 1 */
        font-size: 1em; /* 2 */
      }

      small {
        font-size: 80%;
      }


      sub,
      sup {
        font-size: 75%;
        line-height: 0;
        position: relative;
        vertical-align: baseline;
      }

      sub {
        bottom: -0.25em;
      }

      sup {
        top: -0.5em;
      }

      img {
        border-style: none;
      }

      button,
      input,
      optgroup,
      select,
      textarea {
        font-family: inherit; /* 1 */
        font-size: 100%; /* 1 */
        line-height: 1.15; /* 1 */
        margin: 0; /* 2 */
      }

      button,
      input {
        /* 1 */
        overflow: visible;
      }

      button,
      select {
        /* 1 */
        text-transform: none;
      }

      button,
      [type=button],
      [type=reset],
      [type=submit] {
        -webkit-appearance: button;
      }

      button::-moz-focus-inner,
      [type=button]::-moz-focus-inner,
      [type=reset]::-moz-focus-inner,
      [type=submit]::-moz-focus-inner {
        border-style: none;
        padding: 0;
      }

      button:-moz-focusring,
      [type=button]:-moz-focusring,
      [type=reset]:-moz-focusring,
      [type=submit]:-moz-focusring {
        outline: 1px dotted ButtonText;
      }


      fieldset {
        padding: 0.35em 0.75em 0.625em;
      }


      legend {
        -webkit-box-sizing: border-box;
                box-sizing: border-box; /* 1 */
        color: inherit; /* 2 */
        display: table; /* 1 */
        max-width: 100%; /* 1 */
        padding: 0; /* 3 */
        white-space: normal; /* 1 */
      }

      progress {
        vertical-align: baseline;
      }

      textarea {
        overflow: auto;
      }

      [type=checkbox],
      [type=radio] {
        -webkit-box-sizing: border-box;
                box-sizing: border-box; /* 1 */
        padding: 0; /* 2 */
      }


      [type=number]::-webkit-inner-spin-button,
      [type=number]::-webkit-outer-spin-button {
        height: auto;
      }

      [type=search] {
        -webkit-appearance: textfield; /* 1 */
        outline-offset: -2px; /* 2 */
      }


      [type=search]::-webkit-search-decoration {
        -webkit-appearance: none;
      }

      ::-webkit-file-upload-button {
        -webkit-appearance: button; /* 1 */
        font: inherit; /* 2 */
      }

      details {
        display: block;
      }

      summary {
        display: list-item;
      }

      template {
        display: none;
      }

      [hidden] {
        display: none;
      }

      body,
      html {
        color: #666;
        font-family: "Inter", sans-serif;
        font-size: 14px;
        font-weight: 400;
        line-height: 1.6em;
        overflow-x: hidden;
      }

      h1,
      h2,
      h3,
      h4,
      h5,
      h6 {
        clear: both;
        color: #111;
        padding: 0;
        margin: 0 0 20px 0;
        font-weight: 500;
        line-height: 1.2em;
      }

      h1 {
        font-size: 60px;
      }

      h2 {
        font-size: 48px;
      }

      h3 {
        font-size: 30px;
      }

      h4 {
        font-size: 24px;
      }

      h5 {
        font-size: 18px;
      }

      h6 {
        font-size: 16px;
      }

      p,
      div {
        margin-top: 0;
        line-height: 1.5em;
      }

      p {
        margin-bottom: 15px;
      }

      ul {
        margin: 0 0 25px 0;
        padding-left: 20px;
        list-style: disc;
      }

      ol {
        padding-left: 20px;
        margin-bottom: 25px;
      }

      dfn,
      cite,
      em,
      i {
        font-style: italic;
      }

      blockquote {
        margin: 0 15px;
        font-style: italic;
        font-size: 20px;
        line-height: 1.6em;
        margin: 0;
      }

      address {
        margin: 0 0 15px;
      }

      img {
        border: 0;
        max-width: 100%;
        height: auto;
        vertical-align: middle;
      }

      a {
        color: inherit;
        text-decoration: none;
        -webkit-transition: all 0.3s ease;
        transition: all 0.3s ease;
      }
      a:hover {
        color: #007aff;
      }

      button {
        color: inherit;
        -webkit-transition: all 0.3s ease;
        transition: all 0.3s ease;
      }

      a:hover {
        text-decoration: none;
        color: inherit;
      }

      table {
        width: 100%;
        caption-side: bottom;
        border-collapse: collapse;
      }

      th {
        text-align: left;
      }

      td {
        border-top: 1px solid #dbdfea;
      }

      td {
        padding: 10px 15px;
        line-height: 1.55em;
      }

      th {
        padding: 10px 15px;
        line-height: 1.55em;
      }

      dl {
        margin-bottom: 25px;
      }
      dl dt {
        font-weight: 600;
      }

      b,
      strong {
        font-weight: bold;
      }

      pre {
        color: #666;
        border: 1px solid #dbdfea;
        font-size: 18px;
        padding: 25px;
        border-radius: 5px;
      }

      kbd {
        font-size: 100%;
        background-color: #666;
        border-radius: 5px;
      }

      a:hover {
        color: #007aff;
      }

      ul {
        padding-left: 15px;
      }

      /*--------------------------------------------------------------
      3. Invoice General Style
      ----------------------------------------------------------------*/
      .tm_f10 {
        font-size: 10px;
      }

      .tm_f11 {
        font-size: 11px;
      }

      .tm_f12 {
        font-size: 12px;
      }

      .tm_f13 {
        font-size: 13px;
      }

      .tm_f14 {
        font-size: 14px;
      }

      .tm_f15 {
        font-size: 15px;
      }

      .tm_f16 {
        font-size: 16px;
      }

      .tm_f17 {
        font-size: 17px;
      }

      .tm_f18 {
        font-size: 18px;
      }

      .tm_f19 {
        font-size: 19px;
      }

      .tm_f20 {
        font-size: 20px;
      }

      .tm_f21 {
        font-size: 21px;
      }

      .tm_f22 {
        font-size: 22px;
      }

      .tm_f23 {
        font-size: 23px;
      }

      .tm_f24 {
        font-size: 24px;
      }

      .tm_f25 {
        font-size: 25px;
      }

      .tm_f26 {
        font-size: 26px;
      }

      .tm_f27 {
        font-size: 27px;
      }

      .tm_f28 {
        font-size: 28px;
      }

      .tm_f29 {
        font-size: 29px;
      }

      .tm_f30 {
        font-size: 30px;
      }

      .tm_f40 {
        font-size: 40px;
      }

      .tm_f50 {
        font-size: 50px;
      }

      .tm_light {
        font-weight: 300;
      }

      .tm_normal {
        font-weight: 400;
      }

      .tm_medium {
        font-weight: 500;
      }

      .tm_semi_bold {
        font-weight: 600;
      }

      .tm_bold {
        font-weight: 700;
      }

      .tm_m0 {
        margin: 0px;
      }

      .tm_mb0 {
        margin-bottom: 0px;
      }

      .tm_mb1 {
        margin-bottom: 1px;
      }

      .tm_mb2 {
        margin-bottom: 2px;
      }

      .tm_mb3 {
        margin-bottom: 3px;
      }

      .tm_mb4 {
        margin-bottom: 4px;
      }

      .tm_mb5 {
        margin-bottom: 5px;
      }

      .tm_mb6 {
        margin-bottom: 6px;
      }

      .tm_mb7 {
        margin-bottom: 7px;
      }

      .tm_mb8 {
        margin-bottom: 8px;
      }

      .tm_mb9 {
        margin-bottom: 9px;
      }

      .tm_mb10 {
        margin-bottom: 10px;
      }

      .tm_mb11 {
        margin-bottom: 11px;
      }

      .tm_mb12 {
        margin-bottom: 12px;
      }

      .tm_mb13 {
        margin-bottom: 13px;
      }

      .tm_mb14 {
        margin-bottom: 14px;
      }

      .tm_mb15 {
        margin-bottom: 15px;
      }

      .tm_mb16 {
        margin-bottom: 16px;
      }

      .tm_mb17 {
        margin-bottom: 17px;
      }

      .tm_mb18 {
        margin-bottom: 18px;
      }

      .tm_mb19 {
        margin-bottom: 19px;
      }

      .tm_mb20 {
        margin-bottom: 20px;
      }

      .tm_mb21 {
        margin-bottom: 21px;
      }

      .tm_mb22 {
        margin-bottom: 22px;
      }

      .tm_mb23 {
        margin-bottom: 23px;
      }

      .tm_mb24 {
        margin-bottom: 24px;
      }

      .tm_mb25 {
        margin-bottom: 25px;
      }

      .tm_mb26 {
        margin-bottom: 26px;
      }

      .tm_mb27 {
        margin-bottom: 27px;
      }

      .tm_mb28 {
        margin-bottom: 28px;
      }

      .tm_mb29 {
        margin-bottom: 29px;
      }

      .tm_mb30 {
        margin-bottom: 30px;
      }

      .tm_mb40 {
        margin-bottom: 40px;
      }

      .tm_pt25 {
        padding-top: 25px;
      }

      .tm_pt0 {
        padding-top: 0;
      }

      .tm_radius_6_0_0_6 {
        border-radius: 6px 0 0 6px;
      }

      .tm_radius_0_6_6_0 {
        border-radius: 0 6px 6px 0;
      }

      .tm_radius_0 {
        border-radius: 0 !important;
      }

      .tm_width_1 {
        width: 8.33333333%;
      }

      .tm_width_2 {
        width: 16.66666667%;
      }

      .tm_width_3 {
        width: 25%;
      }

      .tm_width_4 {
        width: 33.33333333%;
      }

      .tm_width_5 {
        width: 41.66666667%;
      }

      .tm_width_6 {
        width: 50%;
      }

      .tm_width_7 {
        width: 58.33333333%;
      }

      .tm_width_8 {
        width: 66.66666667%;
      }

      .tm_width_9 {
        width: 75%;
      }

      .tm_width_10 {
        width: 83.33333333%;
      }

      .tm_width_11 {
        width: 91.66666667%;
      }

      .tm_width_12 {
        width: 100%;
      }

      .tm_border {
        border: 1px solid #dbdfea;
      }

      .tm_border_bottom {
        border-bottom: 1px solid #dbdfea;
      }

      .tm_border_top {
        border-top: 1px solid #dbdfea;
      }

      .tm_border_left {
        border-left: 1px solid #dbdfea;
      }

      .tm_border_right {
        border-right: 1px solid #dbdfea;
      }

      .tm_round_border {
        border: 1px solid #dbdfea;
        overflow: hidden;
        border-radius: 6px;
      }

      .tm_accent_color,
      .tm_accent_color_hover:hover {
        color: #007aff;
      }

      .tm_accent_bg,
      .tm_accent_bg_hover:hover {
        background-color: #007aff;
      }

      .tm_accent_bg_10 {
        background-color: rgba(0, 122, 255, 0.1);
      }

      .tm_accent_bg_20 {
        background-color: rgba(0, 122, 255, 0.15);
      }

      .tm_green_bg {
        background-color: #34c759;
      }

      .tm_green_bg_15 {
        background-color: rgba(52, 199, 89, 0.1);
      }

      .tm_primary_bg,
      .tm_primary_bg_hover:hover {
        background-color: #111;
      }

      .tm_primary_bg_2 {
        background-color: #000036;
      }

      .tm_danger_color {
        color: red;
      }

      .tm_primary_color {
        color: #111;
      }

      .tm_secondary_color {
        color: #666;
      }

      .tm_ternary_color {
        color: #b5b5b5;
      }

      .tm_white_color {
        color: #fff;
      }

      .tm_white_color_60 {
        color: rgba(255, 255, 255, 0.6);
      }

      .tm_gray_bg {
        background: #f5f6fa;
      }

      .tm_ternary_bg {
        background-color: #b5b5b5;
      }

      .tm_accent_10_bg {
        background-color: rgba(0, 122, 255, 0.1);
      }

      .tm_accent_border {
        border-color: #007aff;
      }

      .tm_accent_border_10 {
        border-color: rgba(0, 122, 255, 0.1);
      }

      .tm_accent_border_20 {
        border-color: rgba(0, 122, 255, 0.2);
      }

      .tm_accent_border_30 {
        border-color: rgba(0, 122, 255, 0.3);
      }

      .tm_accent_border_40 {
        border-color: rgba(0, 122, 255, 0.4);
      }

      .tm_accent_border_50 {
        border-color: rgba(0, 122, 255, 0.5);
      }

      .tm_primary_border {
        border-color: #111;
      }

      .tm_gray_border {
        border-color: #f5f6fa;
      }

      .tm_primary_border_2 {
        border-color: #000036;
      }

      .tm_secondary_border {
        border-color: #666;
      }

      .tm_ternary_border {
        border-color: #b5b5b5;
      }

      .tm_border_color {
        border-color: #dbdfea;
      }

      .tm_border_1 {
        border-style: solid;
        border-width: 1px;
      }

      .tm_body_lineheight {
        line-height: 1.5em;
      }

      .tm_invoice_in {
        position: relative;
        z-index: 100;
      }

      .tm_container {
        max-width: 880px;
        padding: 30px 15px;
        margin-left: auto;
        margin-right: auto;
        position: relative;
      }

      .tm_text_center {
        text-align: center;
      }

      .tm_text_uppercase {
        text-transform: uppercase;
      }

      .tm_text_right {
        text-align: right;
      }

      .tm_align_center {
        -webkit-box-align: center;
            -ms-flex-align: center;
                align-items: center;
      }

      .tm_border_bottom_0 {
        border-bottom: 0;
      }

      .tm_border_top_0 {
        border-top: 0;
      }

      .tm_table_baseline {
        vertical-align: baseline;
      }

      .tm_border_none {
        border: none !important;
      }

      .tm_flex {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
      }

      .tm_justify_between {
        -webkit-box-pack: justify;
            -ms-flex-pack: justify;
                justify-content: space-between;
      }

      .tm__align_center {
        -webkit-box-align: center;
            -ms-flex-align: center;
                align-items: center;
      }

      .tm_border_left_none {
        border-left-width: 0;
      }

      .tm_border_right_none {
        border-right-width: 0;
      }

      .tm_table_responsive {
        overflow-x: auto;
      }
      .tm_table_responsive > table {
        min-width: 600px;
      }

      .tm_50_col > * {
        width: 50%;
        -webkit-box-flex: 0;
            -ms-flex: none;
                flex: none;
      }

      .tm_no_border {
        border: none !important;
      }

      .tm_grid_row {
        display: grid;
        grid-gap: 10px 20px;
        list-style: none;
        padding: 0;
      }

      .tm_col_2 {
        grid-template-columns: repeat(2, 1fr);
      }

      .tm_col_3 {
        grid-template-columns: repeat(3, 1fr);
      }

      .tm_col_4 {
        grid-template-columns: repeat(4, 1fr);
      }

      .tm_max_w_150 {
        max-width: 150px;
      }

      .tm_left_auto {
        margin-left: auto;
      }

      hr {
        background: #dbdfea;
        height: 1px;
        border: none;
        margin: 0;
      }

      .tm_invoice {
        background: #fff;
        border-radius: 10px;
        padding: 50px;
      }

      .tm_invoice_footer {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
      }
      .tm_invoice_footer table {
        margin-top: -1px;
      }
      .tm_invoice_footer .tm_left_footer {
        width: 58%;
        padding: 10px 15px;
        -webkit-box-flex: 0;
            -ms-flex: none;
                flex: none;
      }
      .tm_invoice_footer .tm_right_footer {
        width: 42%;
      }

      .tm_note {
        margin-top: 30px;
        font-style: italic;
      }

      .tm_font_style_normal {
        font-style: normal;
      }

      .tm_sign img {
        max-height: 45px;
      }

      .tm_coffee_shop_img {
        position: absolute;
        height: 200px;
        opacity: 0.04;
        top: 40px;
        left: 50%;
        -webkit-transform: translateX(-50%);
                transform: translateX(-50%);
      }
      .tm_coffee_shop_img img {
        max-height: 100%;
      }

      .tm_invoice.tm_style1 .tm_invoice_right {
        -webkit-box-flex: 0;
            -ms-flex: none;
                flex: none;
        width: 60%;
      }
      .tm_invoice.tm_style1 .tm_invoice_table {
        grid-gap: 1px;
      }
      .tm_invoice.tm_style1 .tm_invoice_table > * {
        border: 1px solid #dbdfea;
        margin: -1px;
        padding: 8px 15px 10px;
      }
      .tm_invoice.tm_style1 .tm_invoice_head {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
            -ms-flex-pack: justify;
                justify-content: space-between;
      }
      .tm_invoice.tm_style1 .tm_invoice_head .tm_invoice_right div {
        line-height: 1em;
      }
      .tm_invoice.tm_style1 .tm_invoice_info {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
            -ms-flex-align: center;
                align-items: center;
        -webkit-box-pack: justify;
            -ms-flex-pack: justify;
                justify-content: space-between;
      }
      .tm_invoice.tm_style1 .tm_invoice_info_2 {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
            -ms-flex-pack: justify;
                justify-content: space-between;
        border-top: 1px solid #dbdfea;
        border-bottom: 1px solid #dbdfea;
        padding: 11px 0;
      }
      .tm_invoice.tm_style1 .tm_invoice_seperator {
        min-height: 18px;
        border-radius: 1.6em;
        -webkit-box-flex: 1;
            -ms-flex: 1;
                flex: 1;
        margin-right: 20px;
      }
      .tm_invoice.tm_style1 .tm_invoice_info_list {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
      }
      .tm_invoice.tm_style1 .tm_invoice_info_list > *:not(:last-child) {
        margin-right: 20px;
      }
      .tm_invoice.tm_style1 .tm_logo img {
        max-height: 50px;
      }
      .tm_invoice.tm_style1 .tm_logo.tm_size1 img {
        max-height: 60px;
      }
      .tm_invoice.tm_style1 .tm_logo.tm_size2 img {
        max-height: 70px;
      }
      .tm_invoice.tm_style1 .tm_grand_total {
        padding: 8px 15px;
      }
      .tm_invoice.tm_style1 .tm_box_3 {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
      }
      .tm_invoice.tm_style1 .tm_box_3 > * {
        -webkit-box-flex: 1;
            -ms-flex: 1;
                flex: 1;
      }
      .tm_invoice.tm_style1 .tm_box_3 ul {
        margin: 0;
        padding: 0;
        list-style: none;
      }
      .tm_invoice.tm_style1 .tm_box_3 ul li {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
      }
      .tm_invoice.tm_style1 .tm_box_3 ul li:not(:last-child) {
        margin-bottom: 5px;
      }
      .tm_invoice.tm_style1 .tm_box_3 ul span {
        -webkit-box-flex: 0;
            -ms-flex: none;
                flex: none;
      }
      .tm_invoice.tm_style1 .tm_box_3 ul span:first-child {
        margin-right: 5px;
      }
      .tm_invoice.tm_style1 .tm_box_3 ul span:last-child {
        -webkit-box-flex: 1;
            -ms-flex: 1;
                flex: 1;
      }

      .tm_invoice.tm_style2 .tm_invoice_head {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
            -ms-flex-align: center;
                align-items: center;
        border-bottom: 1px solid #dbdfea;
        padding-bottom: 15px;
        position: relative;
      }
      .tm_invoice.tm_style2 .tm_invoice_left {
        width: 30%;
        -webkit-box-flex: 0;
            -ms-flex: none;
                flex: none;
      }
      .tm_invoice.tm_style2 .tm_invoice_right {
        width: 70%;
        -webkit-box-flex: 0;
            -ms-flex: none;
                flex: none;
      }
      .tm_invoice.tm_style2 .tm_invoice_info {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
      }
      .tm_invoice.tm_style2 .tm_invoice_info_left {
        width: 30%;
        -webkit-box-flex: 0;
            -ms-flex: none;
                flex: none;
      }
      .tm_invoice.tm_style2 .tm_invoice_info_right {
        width: 70%;
        -webkit-box-flex: 0;
            -ms-flex: none;
                flex: none;
      }
      .tm_invoice.tm_style2 .tm_logo img {
        max-height: 60px;
      }
      .tm_invoice.tm_style2 .tm_invoice_title {
        line-height: 0.8em;
      }
      .tm_invoice.tm_style2 .tm_invoice_info_in {
        padding: 12px 20px;
        border-radius: 10px;
      }
      .tm_invoice.tm_style2 .tm_card_note {
        display: inline-block;
        padding: 6px 15px;
        border-radius: 6px;
        margin-bottom: 10px;
        margin-top: 5px;
      }
      .tm_invoice.tm_style2 .tm_invoice_footer .tm_left_footer {
        padding-left: 0;
      }

      .tm_invoice.tm_style1.tm_type1 {
        padding: 0px 50px 30px;
        position: relative;
        overflow: hidden;
        border-radius: 0;
      }
      .tm_invoice.tm_style1.tm_type1 .tm_invoice_head {
        height: 110px;
        position: relative;
      }
      .tm_invoice.tm_style1.tm_type1 .tm_shape_bg {
        position: absolute;
        height: 100%;
        width: 70%;
        -webkit-transform: skewX(35deg);
                transform: skewX(35deg);
        top: 0px;
        right: -100px;
        overflow: hidden;
      }
      .tm_invoice.tm_style1.tm_type1 .tm_shape_bg img {
        height: 100%;
        width: 100%;
        -o-object-fit: cover;
          object-fit: cover;
        -webkit-transform: skewX(-35deg) translateX(-45px);
                transform: skewX(-35deg) translateX(-45px);
      }
      .tm_invoice.tm_style1.tm_type1 .tm_invoice_right {
        position: relative;
        z-index: 2;
      }
      .tm_invoice.tm_style1.tm_type1 .tm_logo img {
        max-height: 70px;
      }
      .tm_invoice.tm_style1.tm_type1 .tm_invoice_seperator {
        margin-right: 0;
        border-radius: 0;
        -webkit-transform: skewX(35deg);
                transform: skewX(35deg);
        position: absolute;
        height: 100%;
        width: 57.5%;
        right: -60px;
        overflow: hidden;
        border: none;
      }
      .tm_invoice.tm_style1.tm_type1 .tm_invoice_seperator img {
        height: 100%;
        width: 100%;
        -o-object-fit: cover;
          object-fit: cover;
        -webkit-transform: skewX(-35deg);
                transform: skewX(-35deg);
        -webkit-transform: skewX(-35deg) translateX(-10px);
                transform: skewX(-35deg) translateX(-10px);
      }
      .tm_invoice.tm_style1.tm_type1 .tm_invoice_info {
        position: relative;
        padding: 4px 0;
      }
      .tm_invoice.tm_style1.tm_type1 .tm_card_note,
      .tm_invoice.tm_style1.tm_type1 .tm_invoice_info_list {
        position: relative;
        z-index: 1;
      }

      .tm_invoice.tm_style3 {
        padding: 0;
      }
      .tm_invoice.tm_style3 .tm_invoice_head {
        padding: 60px 50px;
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
            -ms-flex-pack: justify;
                justify-content: space-between;
        border-radius: 10px 10px 0 0;
      }
      .tm_invoice.tm_style3 .tm_head_address {
        border-left: 2px solid;
        padding: 0px 0 0px 15px;
      }
      .tm_invoice.tm_style3 .tm_invoice_left,
      .tm_invoice.tm_style3 .tm_invoice_right {
        position: relative;
        z-index: 1;
      }
      .tm_invoice.tm_style3 .tm_watermark_title {
        position: absolute;
        left: 0;
        top: 0;
        line-height: 1em;
        font-size: 165px;
        font-weight: bold;
        padding: 20px 30px 20px 30px;
        letter-spacing: 18px;
        opacity: 0.08;
      }
      .tm_invoice.tm_style3 .tm_invoice_info {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
            -ms-flex-pack: justify;
                justify-content: space-between;
        -webkit-box-align: end;
            -ms-flex-align: end;
                align-items: flex-end;
        padding: 0 50px;
        margin-top: -25px;
        padding-bottom: 40px;
      }
      .tm_invoice.tm_style3 .tm_invoice_info_left {
        padding: 20px 30px;
        position: relative;
        z-index: 2;
      }
      .tm_invoice.tm_style3 .tm_invoice_details {
        padding: 0 50px 50px 50px;
      }
      .tm_invoice.tm_style3 .tm_table.tm_style1 th {
        border-color: rgba(255, 255, 255, 0.231372549);
      }
      .tm_invoice.tm_style3 .tm_invoice_footer .tm_left_footer {
        padding: 20px 15px;
      }
      .tm_invoice.tm_style1.tm_type3 {
        position: relative;
        overflow: hidden;
        border-radius: 0;
      }
      .tm_invoice.tm_style1.tm_type3 .tm_shape_1 {
        position: absolute;
        top: -1px;
        left: 0;
      }
      .tm_invoice.tm_style1.tm_type3 .tm_shape_2 {
        position: absolute;
        bottom: 0;
        left: 0;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
      }
      .tm_invoice.tm_style1.tm_type3 .tm_logo img {
        max-height: 60px;
      }
      .tm_invoice.tm_style1.tm_type3 .tm_invoice_head.tm_mb20 {
        margin-bottom: 65px;
      }
      .tm_invoice.tm_style1.tm_type3 .tm_invoice_info_list {
        position: relative;
        padding: 10px 0 10px 40px;
      }
      .tm_invoice.tm_style1.tm_type3 .tm_invoice_info_list_bg {
        position: absolute;
        height: 100%;
        width: calc(100% + 100px);
        top: 0;
        left: 0;
        border-radius: 20px 0 0 0px;
        -webkit-transform: skewX(-35deg);
                transform: skewX(-35deg);
      }

      .tm_invoice.tm_style2.tm_type1 {
        padding-top: 0;
        padding-bottom: 0;
        border-width: 40px 0 0;
        border-style: solid;
        position: relative;
        overflow: hidden;
      }
      .tm_invoice.tm_style2.tm_type1.tm_small_border {
        border-width: 7px 0 0;
      }
      .tm_invoice.tm_style2.tm_type1 .tm_shape_bg {
        position: absolute;
        height: 100%;
        width: 42%;
        -webkit-transform: skewX(-35deg);
                transform: skewX(-35deg);
        top: 0px;
        left: -100px;
      }
      .tm_invoice.tm_style2.tm_type1 .tm_invoice_head {
        padding-top: 15px;
        border-bottom: none;
      }
      .tm_invoice.tm_style2.tm_type1 .tm_logo {
        position: relative;
        z-index: 2;
      }
      .tm_invoice.tm_style2.tm_type1 .tm_bottom_invoice {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        padding: 15px 50px 20px;
        border-top: 1px solid #dbdfea;
        -webkit-box-pack: justify;
            -ms-flex-pack: justify;
                justify-content: space-between;
        -webkit-box-align: center;
            -ms-flex-align: center;
                align-items: center;
        margin: 30px -50px 0;
      }

      .tm_invoice_content {
        position: relative;
        z-index: 10;
      }

      .tm_invoice_wrap {
        position: relative;
      }

      .tm_note_list li:not(:last-child) {
        margin-bottom: 5px;
      }

      .tm_list.tm_style1 {
        list-style: none;
        padding: 0;
        margin: 0;
      }
      .tm_list.tm_style1 svg {
        width: 16px;
        height: initial;
      }
      .tm_list.tm_style1 .tm_list_icon {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        position: absolute;
        left: 0;
        top: 3px;
      }
      .tm_list.tm_style1 li {
        padding-left: 25px;
        position: relative;
      }
      .tm_list.tm_style1 li:not(:last-child) {
        margin-bottom: 5px;
      }
      .tm_list.tm_style1.tm_text_right li {
        padding-left: 0;
        padding-right: 25px;
      }
      .tm_list.tm_style1.tm_text_right .tm_list_icon {
        left: initial;
        right: 0;
      }

      .tm_section_heading {
        border-width: 0 0 1px 0;
        border-style: solid;
      }
      .tm_section_heading > span {
        display: inline-block;
        padding: 8px 15px;
        border-radius: 7px 7px 0 0;
      }
      .tm_section_heading .tm_curve_35 {
        margin-left: 12px;
        margin-right: 0;
      }
      .tm_section_heading .tm_curve_35 span {
        display: inline-block;
      }

      .tm_padd_15_20 {
        padding: 15px 20px;
      }

      .tm_padd_8_20 {
        padding: 8px 20px;
      }

      .tm_padd_20 {
        padding: 20px;
      }

      .tm_padd_15 {
        padding: 15px;
      }

      .tm_padd_10 {
        padding: 10px;
      }

      .tm_padd_5 {
        padding: 5px;
      }

      .tm_curve_35 {
        -webkit-transform: skewX(-35deg);
                transform: skewX(-35deg);
        padding: 12px 20px 12px 30px;
        margin-left: 22px;
        margin-right: 22px;
      }
      .tm_curve_35 > * {
        -webkit-transform: skewX(35deg);
                transform: skewX(35deg);
      }

      .tm_dark_invoice_body {
        background-color: #18191a;
      }

      .tm_dark_invoice {
        background: #252526;
        color: rgba(255, 255, 255, 0.65);
      }
      .tm_dark_invoice .tm_primary_color {
        color: rgba(255, 255, 255, 0.9);
      }
      .tm_dark_invoice .tm_secondary_color {
        color: rgba(255, 255, 255, 0.65);
      }
      .tm_dark_invoice .tm_ternary_color {
        color: rgba(255, 255, 255, 0.4);
      }
      .tm_dark_invoice .tm_gray_bg {
        background: rgba(255, 255, 255, 0.08);
      }
      .tm_dark_invoice .tm_border_color,
      .tm_dark_invoice .tm_round_border,
      .tm_dark_invoice td,
      .tm_dark_invoice th,
      .tm_dark_invoice .tm_border_top,
      .tm_dark_invoice .tm_border_bottom {
        border-color: rgba(255, 255, 255, 0.1);
      }
      .tm_dark_invoice + .tm_invoice_btns {
        background: #252526;
        border-color: #252526;
    }
  </style>
  
</head>

<body>
  <div>
    <div class="tm_invoice_wrap">
      <div class="tm_invoice tm_style1 tm_type1" id="tm_download_section">
        <div class="tm_invoice_in" >
          <div class="tm_invoice_head tm_top_head tm_mb15 tm_align_center">
            <div class="tm_invoice_left">
              <div class="tm_logo"><img src="{{logoBase64()}}" alt="Logo"></div>
            </div>
            <div class="tm_invoice_right tm_text_right tm_mobile_hide">
              <div class="tm_f50 tm_text_uppercase tm_white_color">Factura</div>
            </div>
            <div class="tm_shape_bg tm_accent_bg tm_mobile_hide"></div>
          </div>
          <div class="tm_invoice_info tm_mb25">
            <div class="tm_card_note tm_mobile_hide"></div>
            <div class="tm_invoice_info_list tm_white_color">
              <p class="tm_invoice_number tm_m0">Factura Nº: <b>#{{$revenue->reference}}</b></p>
              <p class="tm_invoice_date tm_m0">Data: <b>{{$revenue->revenue_date}}</b></p>
            </div>
            <div class="tm_invoice_seperator tm_accent_bg"></div>
          </div>
          <div class="tm_invoice_head tm_mb10">
            <div class="tm_invoice_left">
              <p>
                <strong>EMUSANA</strong><br>
                <strong>NUIT:</strong> 4589675831 <br><strong>Telf:</strong> +258 84 521 6358 <br>
                <strong>Email:</strong> info@emusana.co.mz <br>
                <strong>Endereço:</strong> Nampula, Estrada Nacional Número 1, Unidade Comunal Namaterra
            </p>
            </div>
            <div class="tm_invoice_right tm_text_right">
                <p class="tm_mb2"><b class="tm_primary_color">Para</b></p>
                <p>
                    {{$revenue->client->full_name}} <br>
                    {{$revenue->client->clientAddressLast->neighborhood->label}}<br>
                    {{(formatNumberMoz($revenue->client->phone))}} <br>
                </p>
            </div>
          </div>
          <br>
          <div class="tm_table tm_style1">
            <div class="">
              <div class="tm_table_responsive">
                <table>
                  <thead>
                    <tr class="tm_accent_bg">
                      <th class="tm_width_3 tm_semi_bold tm_white_color">Item</th>
                      <th class="tm_width_4 tm_semi_bold tm_white_color">Descrição</th>
                      <th class="tm_width_2 tm_semi_bold tm_white_color">Preço</th>
                      <th class="tm_width_1 tm_semi_bold tm_white_color">Qnt</th>
                      <th class="tm_width_2 tm_semi_bold tm_white_color tm_text_right">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="tm_width_3">{{$revenue->typeRevenue->label}}</td>
                      <td class="tm_width_4">{{$revenue->description}}</td>
                      <td class="tm_width_2">{{formatAmount($revenue->amount)}}</td>
                      <td class="tm_width_1">1</td>
                      <td class="tm_width_2 tm_text_right">{{formatAmount($revenue->amount)}}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="tm_invoice_footer tm_border_top tm_mb5 tm_m0_md">
              <div class="tm_left_footer">
                <p class="tm_mb2"><b class="tm_primary_color">NOTA</b></p>
                <p class="tm_m0">O pagamento desta fatura poderá ser efetuado por depósito ou transferência bancária utilizando os seguintes dados:</p>
                <ul style="margin-left: 15px;">
                    <li>Banco:</li>
                    <li>Titular da Conta:</li>
                    <li>Número da Conta:</li>
                    <li>NIB:</li>
                </ul>
              </div>
              <div class="tm_right_footer">
                <table class="tm_mb15">
                  <tbody>
                    <tr class="tm_gray_bg ">
                      <td class="tm_width_3 tm_primary_color tm_bold">Subtoal</td>
                      <td class="tm_width_3 tm_primary_color tm_bold tm_text_right">MZN {{formatAmount($revenue->amount)}}</td>
                    </tr>
                    <tr class="tm_accent_bg">
                      <td class="tm_width_3 tm_border_top_0 tm_bold tm_f16 tm_white_color">Total	</td>
                      <td class="tm_width_3 tm_border_top_0 tm_bold tm_f16 tm_white_color tm_text_right">MZN {{formatAmount($revenue->amount)}}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="tm_invoice_footer tm_type1">
              <div class="tm_left_footer" style="text-align: center;">
                <img style="width: 100px;" src="{{--asset('qrcodes_receipt/1fd7772b351fdecb876ba92a109abf65131123113016.jpg')--}}" alt="">
              </div>
              <div class="tm_right_footer">
                <div class="tm_sign tm_text_center" style="padding-top: 40px;">
                  <p class="tm_m0 tm_ternary_color">__________________________________</p>
                  <p class="tm_m0 tm_f16 tm_primary_color">{{auth()->user()->name}}</p>
                  <small><em>Processado(a) por SIGEMUNA: {{date('d-m-Y H:i:s')}}</em></small>
                </div>
              </div>
            </div>
          </div>
          <br><br>
          <div class="tm_note tm_text_center tm_font_style_normal">
            <hr class="tm_mb15">
            <p class="tm_mb2"><b class="tm_primary_color">Termos e Condições de Pagamento</b></p>
            <p class="tm_m0">O valor não é reembolsável, incluindo erros cometidos pelo cliente, como depósitos ou transferências incorretas. É responsabilidade do cliente verificar os dados antes do pagamento.</p>
          </div><!-- .tm_note -->
        </div>
      </div>
    </div>
  </div>
</body>
</html>