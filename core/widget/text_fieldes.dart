// ignore_for_file: must_be_immutable

import 'package:flutter/material.dart';
import 'package:flutter_screenutil/flutter_screenutil.dart';

class FieldGeneralWidget extends StatefulWidget {
  bool ispass;
  bool isSecret;
  int? maxlines;
  int? maxlenth;
  final Function(String)? onChanged;
  TextInputType? keyboardType;
  String name;
  Function(String value) val;
  TextEditingController controller;
  Widget? iconPre;
  FieldGeneralWidget(
      {super.key,
      required this.controller,
      required this.isSecret,
      required this.ispass,
      this.maxlines,
      this.keyboardType,
      this.maxlenth,
      this.iconPre,
      required this.name,
      required this.val,
      this.onChanged,
      });

  @override
  State<FieldGeneralWidget> createState() => _FieldGeneralWidgetState();
}

class _FieldGeneralWidgetState extends State<FieldGeneralWidget> {
  @override
  Widget build(BuildContext context) {
    return Padding(
      padding: EdgeInsets.symmetric(
          vertical: 10.h, horizontal: 15.w),
      child: TextFormField(
        obscureText: widget.ispass,
        controller: widget.controller,
        validator: (value) {
          return widget.val(value!);
        },
        minLines: 1,
        maxLength: widget.maxlenth,
        keyboardType: widget.keyboardType,
        maxLines: widget.maxlines ?? 1,
        decoration: InputDecoration(
          hintStyle: const TextStyle(
          ),
            prefixIcon:
                widget.iconPre ?? const SizedBox.shrink(),
            hintText: widget.name,
            label: Text(widget.name),
            suffixIcon: Visibility(
              visible: widget.isSecret,
              child: IconButton(
                  onPressed: () {
                    setState(() {
                      widget.ispass = !widget.ispass;
                    });
                  },
                  icon: Icon(widget.ispass
                      ? Icons.visibility_outlined
                      : Icons.visibility_off_outlined)),
            ),
            border: OutlineInputBorder(
                borderRadius: BorderRadius.circular(15),
                borderSide: const BorderSide(color: Colors.blue)),
            enabledBorder: const OutlineInputBorder(
                borderSide: BorderSide(color: Colors.blue),
                borderRadius: BorderRadius.all(Radius.circular(15))),
            focusedBorder: const OutlineInputBorder(
                borderRadius: BorderRadius.all(Radius.circular(15)),
                borderSide: BorderSide(color: Colors.blue))),
      ),
    );
  }
}
