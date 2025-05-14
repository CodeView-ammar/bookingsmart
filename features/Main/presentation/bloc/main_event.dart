part of 'main_bloc.dart';

abstract class MainEvent {}


class GetRoomsEvent extends MainEvent {}

class AddWeekorSubtractWeekEvent extends MainEvent {
  final bool isAdded;

  AddWeekorSubtractWeekEvent({required this.isAdded});
}

class FillDatesEvent extends MainEvent{
  final DateTime dateTime;

  FillDatesEvent({
    required this.dateTime
  });
}
