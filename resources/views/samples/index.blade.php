@extends('layouts.application')

@section('content')

    <div style="padding: 50px; text-align:center; font-size: 40px;">


        {!! tr("Hello World") !!}

        <br><br>

        {!! tr("Invite", 'Invitation button') !!}
        <br>
        {!! tr("Invite", 'An invitation') !!}

        <br><br>

        {!! tr("Hello <strong>World</strong>") !!}

        <br><br>

        {!! tr("Hello [bold: World]") !!}

        <br><br>

        {!! tr("Hello [bold: World]", ['bold' => '<span style="color: red; font-wight: bold;">{$0}</span>']) !!}

        <br><br>

        {!! tr("Hello {user}", ['user' => 'Michael']) !!}

        <br><br>

        {!! tr("Dear {user}", ['user' => [$michael, '@name']]) !!}
        <br>
        {!! tr("Dear {user}", ['user' => [$anna, '@name']]) !!}

        <br><br>

        @for($i=0; $i<6; $i++)
            {!! tr("You have {count || message}", ['count' => $i]) !!}
            <br>
        @endfor

        <br>

        @for($i=0; $i<3; $i++)
            {!! tr("You have {count | a message, #count# messages}", ['count' => $i]) !!}
            <br>
        @endfor

        <br>

        {!! tr("This is {user::pos} post.", ['user' => [$anna, tr($anna['name'])]]) !!}

        <br><br>

        {!! tr("[bold: {actor}] uploaded [indent: {count || photo}] to [link: {target::pos} photo album].", [
                    'actor' => [$anna, '@name'],
                    'target' => [$michael, '@name'],
                    'link' => ['href' => 'http://www.google.com'],
                    'indent' => '<span style="color: red; font-wight: bold;">{$0}</span>',
                    'count' => 5
              ]) !!}


        <br><br>
        {!! tr("{users} like this post.", ['users' => [[$anna, $michael], '@name', []]]) !!}

        <br><br>
        {!! tr("{users} like this post.", [
                'users' => [$users, function($user) { return tr($user['name']); }, ['limit' => 2]]]) !!}


    </div>

@endsection