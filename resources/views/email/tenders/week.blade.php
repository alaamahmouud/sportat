<table style="border:medium solid rgb(168,168,255); direction: rtl" width="100%" cellspacing="0" border="0">
    <tbody>

    <tr>
        <td width="33%" valgin="top" align="center">
            <b>
                <font color="#993333">
                    {{\Carbon\Carbon::today()->format('d/m/Y')}}
                </font>
                <br>
                من : {{\App\MyHelper\Helper::settingValue('email_sender_name')}}
                <br>
                <font color="#993333">
                    تليفون:{{\App\MyHelper\Helper::settingValue('emails_phone')}}
                </font>
            </b>
        </td>
        <td width="34%" align="center">
            <b>Tender Note</b>
        </td>
        <td width="33%" align="center">
            <b>
                إلى: {{optional($client)->responsible_person}}
                <br>
                <font color="#993333">
                    {{optional($client)->company_name}}
                    <br>
                    {{optional($client)->phone}}
                </font>
            </b>
        </td>
    </tr>
    </tbody>
</table>
<br>
<center><u></u><font face="Monotype Koufi" color="#993333"><b>التقريـــــر الأسبــــــــــــوعي</b></font><u></u>
</center>
<br>
<center>
    <table style="border-collapse:collapse;border:2px solid #376f6f" width="70%" cellspacing="5" cellpadding="5"
           border="1">
        <tbody>
        <tr>
            <td valign="center" align="center"><font face="Monotype Koufi" color="#993333"> <b> ملخص منـــاقصات أرسلت
                        خلال الفترة من : &nbsp; </b></font>{{ request('tender_from') }}<font face="Monotype Koufi" color="#993333">&nbsp;إلى:
                    &nbsp;</font>{{ request('tender_to') }}
            </td>
        </tr>
        </tbody>
    </table>
</center>
<br>
@foreach($categoryWithTenders as $category)
    @if($loop->iteration > 1)
        <br><br>
    @endif

    <h3 style="color: #086f40;">
        <center>{{$category->name}}</center>
    </h3>


    @foreach($category->tenders as $tender)
        <center>
            <b>
                <font face="Monotype Koufi" color="#993333">
                    ( {{$loop->iteration}} )
                    <br>
                </font>
            </b>
            <b>
                {{optional(optional(optional($tender->department)->branch)->advertiser)->name}}
                - {{optional(optional($tender->department)->branch)->name}} - {{optional($tender->department)->name}}
                - {{optional($tender->department)->address}} - {{optional($tender->department)->phone}}
                - {{optional($tender->newsPaper)->name}} {{$tender->published_date}} صفحة {{$tender->page_number}}
            </b>
        </center>

        <table style="border-collapse:collapse;border:2px solid #376f6f" width="100%" cellspacing="5" cellpadding="5"
               border="1" dir="rtl">
            <tbody>
            <tr>
                <td width="50%" valign="center" align="center">
                    <b><font face="Monotype Koufi" color="#993333">بيان المنــاقصــة</font></b>
                </td>
                <td width="15%" valign="center" align="center">
                    <b><font face="Monotype Koufi" color="#993333">تاريخ فتح المظـاريف</font></b>
                </td>
                <td width="15%" valign="center" align="center"><font face="Monotype Koufi" color="#993333">
                        <b>كراســة الشــروط</b></font>
                </td>
                <td width="20%" valign="center" align="center"><font face="Monotype Koufi" color="#993333">
                        <b>التــأمين الإبتــدائي</b></font>
                </td>
            </tr>
            <tr>
                <td width="50%" align="center">
                    <b>{{$tender->title}}<br>
                        رقم المناقصة : {{$tender->tender_number}}
                    </b>
                </td>
                <td width="15%" align="center">
                    <b>{{$tender->envelope_date}}</b>
                </td>
                <td width="15%" align="center">
                    <b>{{$tender->book_price}}</b>
                </td>
                <td width="20%" align="center">
                    <b>{{$tender->primary_insurance}}</b>
                </td>
            </tr>
            </tbody>
        </table>
    @endforeach
@endforeach


