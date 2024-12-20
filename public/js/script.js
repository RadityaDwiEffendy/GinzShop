function DropDown() {
    var dropdown = document.getElementById("Down")
    dropdown.classList.toggle("active")
}


function updateTime() {
    var now = new Date();


    var months = [
        "Januari", "Februari", "Maret", "April", "Mei", "Juni",
        "Juli", "Agustus", "September", "Oktober", "November", "Desember"
    ];


    var day = now.getDate();
    var month = months[now.getMonth()];
    var year = now.getFullYear();

    var hours = now.getHours();
    var minutes = now.getMinutes();



    if (minutes < 10) minutes = '0' + minutes;



    var formattedDate = day + ' ' + month + ' ' + year;
    var formattedTime = hours + ':' + minutes;


    var formattedDateTime = formattedDate + ' ' + formattedTime;


    document.getElementById('datetime').value = formattedDateTime;
}


updateTime();
setInterval(updateTime, 1000)


