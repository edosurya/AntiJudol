function helper_date(data) {
    var hasil = data.split("-").reverse().join("-");
    return hasil;
}

function helper_date_time(data) {
    var dateTime = data.split(" ");
    var date = dateTime[0].split("-").reverse().join("-");
    return date + "<br>" + dateTime[1];
}

function helper_numeric(data) {
    var hasil = (Math.round(data * 100) / 100).toLocaleString();
    return hasil;
}

function helper_current_date() {
    var d = new Date();
    let month = ("0" + (d.getMonth() + 1)).slice(-2);
    // var strDate = d.getFullYear() + "-" + month + "-" + d.getDate();
    var strDate = d.getDate() + "-" + month + "-" + d.getFullYear();
    return strDate;
}

function helper_money_render(data) {
    var values = data.replace(/\./g, "");
    var xx = new Intl.NumberFormat("ID", {
        minimumFractionDigits: 0,
        maximumFractionDigits: 2,
    });
    return xx.format(values);
}

function helper_money(data) {
    var xx = new Intl.NumberFormat("ID", {
        style: "currency",
        currency: "IDR",
        minimumFractionDigits: 0,
        maximumFractionDigits: 2,
    });
    return xx.format(data);
}

function uppercase(name) {
    var txt = document.getElementById(name);
    txt.value = txt.value.toUpperCase();
}
