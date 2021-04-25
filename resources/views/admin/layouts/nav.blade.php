<li style="margin-right:20px"><a href="/adminpanel"><i class="fa fa-circle-o"></i><span>التحكم الرئيسيي </span></a></li>
<li style="margin-right:20px"><a href="/adminpanel/sitesettings"><i class="fa fa-circle-o"></i><span> الاعدادات الرئيسية</span></a></li>

{{-- users --}}
<li class="treeview">
    <a href="#">
      <i class="fa fa-users pull-left"></i> <span>التحكم في الاعضاء</span></i>
    </a>
    <ul class="treeview-menu">
      <li class="active" style="margin-right:20px"><a href="{{ url('/adminpanel/users/create') }}"><i class="fa fa-circle-o"></i>اضافة عضو</a></li>
      <li><a href="{{ url('/adminpanel/users') }}" style="margin-right:20px"><i class="fa fa-circle-o"></i>الاعضاء</a></li>
    </ul>
</li>


{{-- buildings --}}


<li class="treeview">
    <a href="#">
      <i class="fa fa-building pull-left"></i> <span>التحكم في العقارات</span></i>
    </a>
    <ul class="treeview-menu">
      <li class="active" style="margin-right:20px"><a href="{{ url('/adminpanel/buildings/create') }}"><i class="fa fa-circle-o"></i>اضافة عقار</a></li>
      <li><a href="{{ url('/adminpanel/buildings') }}" style="margin-right:20px"><i class="fa fa-circle-o"></i>العقارات</a></li>
    </ul>
</li>


{{-- contact --}}
<li><a href="{{ url('/adminpanel/contact') }}" style="margin-right:20px"><i class="fa fa-envelope-o"></i><span>الرسائل</span></a></li>