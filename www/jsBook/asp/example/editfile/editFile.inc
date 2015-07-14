<script>
function editfile() {
        var keycode = event.keyCode;
        if (keycode==120) {
                document.location="editfile.asp?FileName=<%=Request.ServerVariables("PATH_INFO")%>"
        }
}
</script>
<script>document.onkeydown=editfile;</script>
<% session("source") = Request.ServerVariables("URL") %>