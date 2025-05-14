// To parse this JSON data, do
//
//     final roomModel = roomModelFromJson(jsonString);
import 'dart:convert';

RoomModel roomModelFromJson(String str) => RoomModel.fromJson(json.decode(str));

String roomModelToJson(RoomModel data) => json.encode(data.toJson());

class RoomModel {
    List<Datum> data;

    RoomModel({
        required this.data,
    });

    factory RoomModel.fromJson(Map<String, dynamic> json) => RoomModel(
        data: List<Datum>.from(json["data"].map((x) => Datum.fromJson(x))),
    );

    Map<String, dynamic> toJson() => {
        "data": List<dynamic>.from(data.map((x) => x.toJson())),
    };
}

class Datum {
    String hallCustCode;
    String hallTitle;
    String hallCode;
    List<PrepareHallDay> prepareHallDays;

    Datum({
        required this.hallCustCode,
        required this.hallTitle,
        required this.hallCode,
        required this.prepareHallDays,
    });

    factory Datum.fromJson(Map<String, dynamic> json) => Datum(
        hallCustCode: json["hall_cust_code"],
        hallTitle: json["hall_title"],
        hallCode: json["hall_code"],
        prepareHallDays: List<PrepareHallDay>.from(json["prepareHallDays"].map((x) => PrepareHallDay.fromJson(x))),
    );

    Map<String, dynamic> toJson() => {
        "hall_cust_code": hallCustCode,
        "hall_title": hallTitle,
        "hall_code": hallCode,
        "prepareHallDays": List<dynamic>.from(prepareHallDays.map((x) => x.toJson())),
    };
}

class PrepareHallDay {
    String dayName;
    List<AvailableDay> availableDay;
    List<Booking> bookings;

    PrepareHallDay({
        required this.dayName,
        required this.availableDay,
        required this.bookings,
    });

    factory PrepareHallDay.fromJson(Map<String, dynamic> json) => PrepareHallDay(
        dayName: json["dayName"],
        availableDay: List<AvailableDay>.from(json["AvailableDay"].map((x) => AvailableDay.fromJson(x))),
        bookings: List<Booking>.from(json["bookings"].map((x) => Booking.fromJson(x))),
    );

    Map<String, dynamic> toJson() => {
        "dayName": dayName,
        "AvailableDay": List<dynamic>.from(availableDay.map((x) => x.toJson())),
        "bookings": List<dynamic>.from(bookings.map((x) => x.toJson())),
    };
}

class AvailableDay {
    String sysFromHour;
    String sysToHour;

    AvailableDay({
        required this.sysFromHour,
        required this.sysToHour,
    });

    factory AvailableDay.fromJson(Map<String, dynamic> json) => AvailableDay(
        sysFromHour: json["sys_from_hour"],
        sysToHour: json["sys_to_hour"],
    );

    Map<String, dynamic> toJson() => {
        "sys_from_hour": sysFromHour,
        "sys_to_hour": sysToHour,
    };
}

class Booking {
    int bookiingId;
    String date;
    String bookingHourStart;
    String bookingHourEnd;

    Booking({
        required this.bookiingId,
        required this.date,
        required this.bookingHourStart,
        required this.bookingHourEnd,
    });

    factory Booking.fromJson(Map<String, dynamic> json) => Booking(
        bookiingId: json["bookiing_id"],
        date: json["date"],
        bookingHourStart: json["booking_hour_start"],
        bookingHourEnd: json["booking_hour_end"],
    );

    Map<String, dynamic> toJson() => {
        "bookiing_id": bookiingId,
        "date": date,
        "booking_hour_start": bookingHourStart,
        "booking_hour_end": bookingHourEnd,
    };
}

