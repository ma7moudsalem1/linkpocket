<!-- Start Footer Section -->
        <section class="footer">
            <div class="copyright text-center">
                Copyright &copy; {{ date('Y') }} <a href="{{ url('/') }}" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="{{ getSettings('short').' '.getSettings() }}">{{ getSettings('short') . ' ' . getSettings() }}</a>
                Created by <a href="{{ chackUrl( getSettings('copy_link') ) }}" target="_blank" el="nofollow"
                aria-hidden="true" data-toggle="tooltip" data-placement="top" title="{{ getSettings('copy_title') }}"
                >{{ getSettings('copy_title') }}</a>
            </div>
        </section>
<!-- End Footer Section -->