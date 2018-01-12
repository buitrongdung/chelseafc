<div id="oClock" style="color: white"></div>
<div id="cookie" onload="checkCookie()"></div>
<div> <h1>sfas</h1>
    {menu}
</div>
<script type="text/javascript">
    function setCookie(cname, cvalue, exdays)
    {
        var d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        var expires = 'exPires=' + d.toGMTString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(cname)
    {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for(var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    function checkCookie()
    {
        var user = getCookie("username");
        if (user !== "") {
            alert("My name is " + user);
        } else {
            user = prompt("Please enter name: ", "");
            if (user !== "" && user !== null) {
                setCookie("username", user, 30);
            }
        }
    }
</script>