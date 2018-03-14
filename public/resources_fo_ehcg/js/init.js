var timer;
var calId = 1;
var lastClicked = 0;
var statusEstimateCheckMap = {};

statusEstimateCheckMap.estimateCanceled = true;
statusEstimateCheckMap.estimateWaiting = true;
statusEstimateCheckMap.estimateNotCredited = true;
statusEstimateCheckMap.estimateConfirmed = true;
statusEstimateCheckMap.estimateCredited = true;

var currentYear = new Date().getFullYear();

var optionsMonthPicker = {
    pattern: 'M-yyyy', // Default is 'mm/yyyy' and separator char is not mandatory
    selectedYear: currentYear,
    startYear: 2017,
    finalYear: 2050,
    monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre']
};

var monthPickerNames = ['JANV.', 'FÉVR.', 'MARS', 'AVR.', 'MAI', 'JUIN', 'JUIL.', 'AOÛT', 'SEPT.', 'OCT.', 'NOV.', 'DÉC']

function initCalendar(url, div)
{

    var br = '<br />';

    var loading = '<div style="margin:auto;width:100px" id="loadingFormula"><img src="img/standard/loaders/loading32.gif" /></div>';
    div.html(br + br + br + br + br + br + br + br + loading);

    $.ajax({
        url: $baseUrl + url,
        type: 'POST',
        success: function(data) {
            div.html(data);
        }
    });
}

$(function() {



    initCalendar("/auth/calendar/", $("#divAgenda"));


});