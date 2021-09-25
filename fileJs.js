addEventListener("load",()=>{
  $("#loader").hide();
  $("textarea").val($("#dataHolder").html());
});
addEventListener("beforeunload",()=>{
  $("#loader").show();
  });
onbeforeunload=()=>{
  $("#loader").show();
}
action("#copy","click",()=>{
  const val=getQr("textarea").value
  if(val.trim()=="")return message("no data to copy");
  copy(val);
});