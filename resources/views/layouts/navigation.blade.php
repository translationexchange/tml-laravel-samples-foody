{{ tml_begin_source('/common/navigation') }}
<div class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">
          {!! tr("Toggle navigation") !!}
        </span>
                <span class="icon-bar"></span> <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">
                <strong>
                    Foody
                </strong>
            </a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li>
                    {!! tml_language_selector_tag("sideflags") !!}
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href='/recipes/new'>
                        {!! tr("Add Recipe") !!}
                    </a></li>
            </ul>
        </div>
    </div>
</div>
{{ tml_finish_source() }}