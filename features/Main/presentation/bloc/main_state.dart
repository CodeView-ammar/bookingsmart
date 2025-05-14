part of 'main_bloc.dart';

abstract class MainState{

}
class MainInitial extends MainState {}

class ScrollState extends MainState{}

class ChangeDateState extends MainState{}

class LoadingRoomsState extends MainState{}

class SuccessRoomsState extends MainState{
  final RoomModel data;

  SuccessRoomsState({
    required this.data
  });
}

class ErrorRoomsState extends MainState{
  final String message;

  ErrorRoomsState({
    required this.message
  });
}