part of 'login_bloc.dart';

abstract class LoginEvent{

}

class SetPasswordEvent extends LoginEvent{}

class LoginNowEvent extends LoginEvent{}

class GetCachedDataEvent extends LoginEvent{}