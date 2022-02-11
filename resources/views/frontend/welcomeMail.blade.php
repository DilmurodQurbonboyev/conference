<h1>
    <h4>
        @if($app->getLocale() == 'ru')
            <div class="alert alert-success alert-block">
                <strong>После отправки регистрационной формы вы будете проинформированы о том, что данные
                    были успешно отправлены, однако это не следует ошибочно принимать за подтверждение
                    данного запроса на регистрацию. После одобрения со стороны организаторов, на
                    указанный электронный адрес будет отправлено отдельное электронное письмо,
                    подтверждающее очное участие или же данные для доступа к конференции виртуальных
                    участников. В целях безопасности, ссылки и пароли будут отправляться в двух разных
                    электронных письмах.</strong>
            </div>
        @else
            <div class="alert alert-success alert-block">
                <strong> Upon submitting a registration form, you will be informed that data has been successfully
                    submitted, which
                    should not be confused with approval of a given registration request. Upon approval by the
                    organizers, a
                    separate email will be sent to the indicated e-mail confirming physical participation or the meeting
                    access
                    details for virtual participants. For security reasons, links and passwords will be sent in two
                    different
                    e-mails.
                </strong>
            </div>
        @endif
    </h4>
</h1>
