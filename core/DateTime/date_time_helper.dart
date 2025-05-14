import 'package:intl/intl.dart';

class DateTimeHelper {
  static String getHoursByAmBm(DateTime dateTime) {
    var format = DateFormat.j();
    var dateString = format.format(dateTime);
    return dateString;
  }

  static String getDatetimeFormat2(DateTime dateTime) {
    var format = DateFormat.yMd();
    String dateString = format.format(dateTime);
    String newDate = dateString;
    return newDate;
  }

  static String formatt(timeStamp) {
    var times = DateTime.fromMillisecondsSinceEpoch(timeStamp.seconds * 1000);
    return DateFormat('hh:mm a').format(times);
  }

  static String getDatetimeFormat(DateTime dateTime) {
    var format = DateFormat.d();
    var dateString = format.format(dateTime);
    return dateString;
  }

  static String getDatetimeFormatmonth(DateTime dateTime) {
    var format = DateFormat.M();
    var dateString = format.format(dateTime);
    return dateString;
  }

  static String getHours(DateTime dateTime) {
    String ss = DateFormat('h:mm a').format(dateTime);

    return ss;
  }

  static String getDayByWeekDay({required int weekday}) {
    if (weekday == 1) {
      return 'Monday';
    } else if (weekday == 2) {
      return 'Tuesday';
    } else if (weekday == 3) {
      return 'Wednesday';
    } else if (weekday == 4) {
      return 'Thursday';
    } else if (weekday == 5) {
      return 'Friday';
    } else if (weekday == 6) {
      return 'Saturday';
    } else {
      return 'Sunday';
    }
  }

  static String getMonth(String month) {
    switch (month) {
      case '1':
        return 'يناير';
      case '2':
        return 'فبراير';
      case '3':
        return 'مارس';
      case '4':
        return 'ابريل';
      case '5':
        return 'مايو';
      case '6':
        return 'يونيو';
      case '7':
        return 'يوليو';
      case '8':
        return 'اغسطس';
      case '9':
        return 'سبتمبر';
      case '10':
        return 'اكتوبر';
      case '11':
        return 'نوفمبر';
      case '12':
        return 'ديسمبر';
      default:
        return '..';
    }
  }

  static String getHourss(int hour) {
    switch (hour) {
      case 0:
        return '12 AM';
      case 1:
        return '1 AM';
      case 2:
        return '2 AM';
      case 3:
        return '3 AM';
      case 4:
        return '4 AM';
      case 5:
        return '5 AM';
      case 6:
        return '6 AM';
      case 7:
        return '7 AM';
      case 8:
        return '9 AM';
      case 9:
        return '9 AM';
      case 10:
        return '10 AM';
      case 11:
        return '11 AM';
      case 12:
        return '12 AM';
      case 13:
        return '1 PM';
      case 14:
        return '2 PM';
      case 15:
        return '3 PM';
      case 16:
        return '4 PM';
      case 17:
        return '5 PM';
      case 18:
        return '6 PM';
      case 19:
        return '7 PM';
      case 20:
        return '8 PM';
      case 21:
        return '9 PM';
      case 22:
        return '10 PM';
      case 23:
        return '11 PM';
      default:
        return '..';
    }
  }

 static List<DateTime> getStartAndEndDays({required DateTime todayDate}) {
    List<DateTime> daysData = [];

    if (todayDate.weekday == 1) {
      daysData.add(todayDate.subtract(const Duration(days: 1)));
      daysData.add(todayDate.add(const Duration(days: 6)));
      return daysData;
    } else if (todayDate.weekday == 2) {
      daysData.add(todayDate.subtract(const Duration(days: 2)));
      daysData.add(todayDate.add(const Duration(days: 5)));
      return daysData;
    } else if (todayDate.weekday == 3) {
      daysData.add(todayDate.subtract(const Duration(days: 3)));
      daysData.add(todayDate.add(const Duration(days: 4)));
      return daysData;
    } else if (todayDate.weekday == 4) {
      daysData.add(todayDate.subtract(const Duration(days: 4)));
      daysData.add(todayDate.add(const Duration(days: 3)));
      return daysData;
    } else if (todayDate.weekday == 5) {
      daysData.add(todayDate.subtract(const Duration(days: 5)));
      daysData.add(todayDate.add(const Duration(days: 2)));
      return daysData;
    } else if (todayDate.weekday == 6) {
      daysData.add(todayDate.subtract(const Duration(days: 6)));
      daysData.add(todayDate.add(const Duration(days: 1)));
      return daysData;
    } else {
      daysData.add(todayDate);
      daysData.add(todayDate.add(const Duration(days: 7)));
      return daysData;
    }
  }
}
