/**
 * Created by Dzung_cfc on 04-Jul-16.
 */
function showPage()
{
    document.getElementById('idNewDS').style.display = 'block';
}
function hidePage()
{
    document.getElementById('idNewDS').style.display = 'none';
}
function showTeam()
{
    document.getElementById('idTeam').style.display = 'block';
}
function hideTeam()
{
    document.getElementById('idTeam').style.display = 'none';
}
function showVideo()
{
    document.getElementById('idVideo').style.display = 'block';
}
function hideVideo()
{
    document.getElementById('idVideo').style.display = 'none';
}
function showMenu(elmId)
{
    var className = document.getElementsByClassName('newDS');
    var i;
    for (i = 0; i < className.length; i ++) {
        className[i].style.display = 'none';
    }
    document.getElementById(elmId).style.display = 'block';
}
function hideMenu(elmId)
{
   console.log(elmId);
    document.getElementById(elmId).style.display = 'none';

}