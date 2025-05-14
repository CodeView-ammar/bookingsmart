import 'dart:convert';

List<HallModel> hallModelFromJsson(String str) =>
    List<HallModel>.from(json.decode(str).map((x) => HallModel.fromJson(x)));

class HallModel {
  final String hallTitle;
  final List<BookingHall> booking;

  HallModel({required this.booking, required this.hallTitle});

  factory HallModel.fromJson(Map<String, dynamic> json) {
    return HallModel(
        booking: List<BookingHall>.from(
            json['booking'].map((x) => BookingHall.fromJson(x))),
        hallTitle: json['hall_title']);
  }
}

class BookingHall {
  final int id;
  final List<BookingHours> bookingHours;

  BookingHall({required this.bookingHours, required this.id});

  factory BookingHall.fromJson(Map<String, dynamic> json) {
    return BookingHall(
        bookingHours: List<BookingHours>.from(
            json['booking_hours'].map((x) => BookingHours.fromJson(x))),
        id: json['booking_Id']);
  }
}

class BookingHours {
  final String bookingDayName;
  final String date;
  final String bookingHourStart;
  final String bookingHourEnd;

  BookingHours(
      {required this.bookingDayName,
      required this.bookingHourEnd,
      required this.bookingHourStart,
      required this.date});

  factory BookingHours.fromJson(Map<String, dynamic> json) {
    return BookingHours(
        bookingDayName: json['bookingDay_Name'],
        bookingHourEnd: json['booking_hour_end'],
        bookingHourStart: json['booking_hour_start'],
        date: json['date']);
  }
}
