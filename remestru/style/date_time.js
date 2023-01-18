function date_time(id)
{
        date = new Date;
        year = date.getFullYear();
        month = date.getMonth();

        h = date.getHours();
        if(h<10)
        {
                h = "0"+h;
        }
        m = date.getMinutes();
        if(m<10)
        {
                m = "0"+m;
        }
        s = date.getSeconds();
        if(s<10)
        {
                s = "0"+s;
        }
        d = date.getDate();
        if(d<10)
        {
                d = "0"+d;
        }
				month = +month+1;
        if(month<10)
        {
                month = "0"+month;
        }
        result = ''+year+'-'+month+'-'+d+'&nbsp;&nbsp;&nbsp;&nbsp;'+h+':'+m+':'+s;
        document.getElementById(id).innerHTML = result;
        setTimeout('date_time("'+id+'");','1000');
        return true;
}