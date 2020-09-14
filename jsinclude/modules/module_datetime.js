class Datetime
{
    //Could have used Datetimejs, but to show my programming skills abit better I didn't
    get_timestamp()
    {
        return this.create_timestamp(new Date());
    }

    correct_month(month)
    {
        return month+1;
    }

    create_timestamp(date_)
    {
        var date = new Date(date_);

        var time_values = [ date.getDate(), this.correct_month(date.getMonth()), date.getFullYear(), date.getHours(), date.getMinutes(), date.getSeconds() ];

        time_values.forEach(function(part, index) {
            if(time_values[index] < 10)
            {
                time_values[index] = '0' + time_values[index];
            }
        });

        return time_values[0] + "-" + time_values[1] + "-" + time_values[2] + " " + time_values[3] + ":" + time_values[4] + ":" + time_values[5];
    }
}