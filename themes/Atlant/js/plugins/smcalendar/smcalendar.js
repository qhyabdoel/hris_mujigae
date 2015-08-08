label_weekdaysShort = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
label_months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
cal_current_date = new Date();

function Calendar(month, year) {
	this.month = (isNaN(month) || month == null) ? cal_current_date.getMonth() : month;
	this.year  = (isNaN(year) || year == null) ? cal_current_date.getFullYear() : year;
	this.html = '';
}

Calendar.prototype.generateHTML = function(){
	// get first day of month
	var firstDay = new Date(this.year, this.month, 1);
	var startingDay = firstDay.getDay();

	// find number of days in month
	var monthLength = (new Date(this.year, this.month + 1, 0)).getDate();

	// do the header
	var monthName = label_months[this.month]
	var html = '<div>' + monthName + '&nbsp;' + this.year + '</div><table class="table"><thead><tr>';
	for(var i = 0; i <= 6; i++ ){
		html += '<th>' + label_weekdaysShort[i] + '</th>';
	}
	html += '</tr></thead>';

	// fill in the days
	var day = 1;
	html += '<tbody>';
	// this loop is for is weeks (rows)
	for (var i = 0; i < 9; i++) {
		// this loop is for weekdays (cells)
		for (var j = 0; j <= 6; j++) {
			html += '<td>';
			if (day <= monthLength && (i > 0 || j >= startingDay)) {
				html += '<div>' + day + '</div><select><option>AAA</option></select>';
				day++;
			}
			html += '</td>';
		}
		// stop making rows if we've run out of days
		if (day > monthLength) {
			break;
		} else {
			html += '</tr><tr>';
		}
	}
	html += '</tbody></table>';

	this.html = html;
}

Calendar.prototype.getHTML = function() {
	return this.html;
}