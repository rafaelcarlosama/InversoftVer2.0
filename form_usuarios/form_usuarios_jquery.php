
function scJQGeneralAdd() {
  $('input:text.sc-js-input').listen();
  $('input:password.sc-js-input').listen();
  $('input:checkbox.sc-js-input').listen();
  $('input:radio.sc-js-input').listen();
  $('select.sc-js-input').listen();
  $('textarea.sc-js-input').listen();

} // scJQGeneralAdd

function scFocusField(sField) {
  var $oField = $('#id_sc_field_' + sField);

  if (0 == $oField.length) {
    $oField = $('input[name=' + sField + ']');
  }

  if (0 == $oField.length && document.F1.elements[sField]) {
    $oField = $(document.F1.elements[sField]);
  }

  if (false == scSetFocusOnField($oField) && $("#id_ac_" + sField).length > 0) {
    if (false == scSetFocusOnField($("#id_ac_" + sField))) {
      setTimeout(function () { scSetFocusOnField($("#id_ac_" + sField)); }, 500);
    }
  }
  else {
    setTimeout(function() { scSetFocusOnField($oField); }, 500);
  }
} // scFocusField

function scSetFocusOnField($oField) {
  if ($oField.length > 0 && $oField[0].offsetHeight > 0 && $oField[0].offsetWidth > 0 && !$oField[0].disabled) {
    $oField[0].focus();
    return true;
  }
  return false;
} // scSetFocusOnField

function scEventControl_init(iSeqRow) {
  scEventControl_data["id_usuario" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["nombre_usuario" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["email_usuario" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["password_usuario" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["estado_usuario" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["id_perfil" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["id_tipodoc" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["id_usuario" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_usuario" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombre_usuario" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombre_usuario" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["email_usuario" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["email_usuario" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["password_usuario" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["password_usuario" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["estado_usuario" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["estado_usuario" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_perfil" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_perfil" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_tipodoc" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_tipodoc" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("id_perfil" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("id_tipodoc" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  scEventControl_data[fieldName]["change"] = false;
} // scEventControl_onFocus

function scEventControl_onBlur(sFieldName) {
  scEventControl_data[sFieldName]["blur"] = false;
  if (scEventControl_data[sFieldName]["change"]) {
        if (scEventControl_data[sFieldName]["original"] == $("#id_sc_field_" + sFieldName).val()) {
          scEventControl_data[sFieldName]["change"] = false;
        }
  }
} // scEventControl_onBlur

function scEventControl_onChange(sFieldName) {
  scEventControl_data[sFieldName]["change"] = false;
} // scEventControl_onChange

function scEventControl_onChange_call(sFieldName, iFieldSeq) {
  var oField, fieldId, fieldName;
  oField = $("#id_sc_field_" + sFieldName + iFieldSeq);
  fieldId = oField.attr("id");
  fieldName = fieldId.substr(12);
} // scEventControl_onChange

function scEventControl_onAutocomp(sFieldName) {
  scEventControl_data[sFieldName]["autocomp"] = false;
} // scEventControl_onChange

var scEventControl_data = {};

function scJQEventsAdd(iSeqRow) {
  $('#id_sc_field_id_usuario' + iSeqRow).bind('blur', function() { sc_form_usuarios_id_usuario_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_usuarios_id_usuario_onfocus(this, iSeqRow) });
  $('#id_sc_field_nombre_usuario' + iSeqRow).bind('blur', function() { sc_form_usuarios_nombre_usuario_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_usuarios_nombre_usuario_onfocus(this, iSeqRow) });
  $('#id_sc_field_email_usuario' + iSeqRow).bind('blur', function() { sc_form_usuarios_email_usuario_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_usuarios_email_usuario_onfocus(this, iSeqRow) });
  $('#id_sc_field_password_usuario' + iSeqRow).bind('blur', function() { sc_form_usuarios_password_usuario_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_usuarios_password_usuario_onfocus(this, iSeqRow) });
  $('#id_sc_field_estado_usuario' + iSeqRow).bind('blur', function() { sc_form_usuarios_estado_usuario_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_usuarios_estado_usuario_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_perfil' + iSeqRow).bind('blur', function() { sc_form_usuarios_id_perfil_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_usuarios_id_perfil_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_tipodoc' + iSeqRow).bind('blur', function() { sc_form_usuarios_id_tipodoc_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_usuarios_id_tipodoc_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_usuarios_id_usuario_onblur(oThis, iSeqRow) {
  do_ajax_form_usuarios_validate_id_usuario();
  scCssBlur(oThis);
}

function sc_form_usuarios_id_usuario_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_usuarios_nombre_usuario_onblur(oThis, iSeqRow) {
  do_ajax_form_usuarios_validate_nombre_usuario();
  scCssBlur(oThis);
}

function sc_form_usuarios_nombre_usuario_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_usuarios_email_usuario_onblur(oThis, iSeqRow) {
  do_ajax_form_usuarios_validate_email_usuario();
  scCssBlur(oThis);
}

function sc_form_usuarios_email_usuario_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_usuarios_password_usuario_onblur(oThis, iSeqRow) {
  do_ajax_form_usuarios_validate_password_usuario();
  scCssBlur(oThis);
}

function sc_form_usuarios_password_usuario_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_usuarios_estado_usuario_onblur(oThis, iSeqRow) {
  do_ajax_form_usuarios_validate_estado_usuario();
  scCssBlur(oThis);
}

function sc_form_usuarios_estado_usuario_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_usuarios_id_perfil_onblur(oThis, iSeqRow) {
  do_ajax_form_usuarios_validate_id_perfil();
  scCssBlur(oThis);
}

function sc_form_usuarios_id_perfil_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_usuarios_id_tipodoc_onblur(oThis, iSeqRow) {
  do_ajax_form_usuarios_validate_id_tipodoc();
  scCssBlur(oThis);
}

function sc_form_usuarios_id_tipodoc_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

