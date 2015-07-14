<html>
<!--#include file="head.inc"-->

<script language="JavaScript">settitle("Examples of CGI")</script>

<table border=0 width=80% align=center>
<tr><td>
<ul>
<li>Simple examples:
	<ul>
<LI>Beginners' CGIs:
        <UL>
        <LI><A target=new href="/jang/sandbox/cgi/examples/hello1.pl">
        Hello, World!!</A>
        (<A target=n1 href=/jang/sandbox/showcode.asp?source=/jang/sandbox/cgi/examples/hello1.pl>
        hello1.pl</A>)
        <UL>
        This is the simplest CGI in the world!
        </UL>
        <LI><A target=new href="/jang/sandbox/cgi/examples/hello2.pl">
        Hello, World!!</A>
        (<A target=n1 href=/jang/sandbox/showcode.asp?source=/jang/sandbox/cgi/examples/hello2.pl>
        hello2.pl</A>)
        <UL>
        This CGI uses Perl's "here document" to make the printing command
        easier to read.
        </UL>
<LI> <A target=new href="/jang/sandbox/cgi/examples/whoami.pl">
        CGI's login user</A>
        (<A target=n1 href=/jang/sandbox/showcode.asp?source=/jang/sandbox/cgi/examples/whoami.pl>
        whoami.pl</A>)
        </UL>
<LI> Randomness:
        <UL>
        <LI><A href="/jang/cgi-bin/randback_s.pl" target="new">
                Simple version for random background images</A>
                (<A target=new href=/jang/sandbox/showcode.asp?source=/jang/cgi-bin/randback_s.pl>
                randback_s.pl</A>)
        <LI><A href="/jang/cgi-bin/randback.pl" target="new">
                Advanced version for random background images</A>
                (<A target=new href=/jang/sandbox/showcode.asp?source=/jang/cgi-bin/randback.pl>
                randback.pl</A>)
        <LI><A href="/jang/cgi-bin/randmidi.pl" target="new">
                Advanced version for random midi files</A>
                (<A target=new href=/jang/sandbox/showcode.asp?source=/jang/cgi-bin/randmidi.pl>
                randmidi.pl</A>)
        </UL>
<LI> <A href="/jang/cgi-bin/dispfile.pl?/users/jang/cgi-bin/env.pl">
        Display a file</A>
                (<A target=new href=/jang/sandbox/showcode.asp?source=/jang/cgi-bin/dispfile.pl>
                dispfile.pl</A>)
<LI> Form and environmental variables check-up:
        <UL>
        <LI> <A href="/jang/cgi-bin/mimetest.pl">MIME test</A>
                (<A target=new href=/jang/sandbox/showcode.asp?source=/jang/cgi-bin/mimetest.pl>
                mimetest.pl</A>)
        <LI> <A href="/jang/cgi-bin/env_s.pl"> All environmental variables in a CGI </A>
                (<A target=new href=/jang/sandbox/showcode.asp?source=/jang/cgi-bin/env_s.pl>
                env_s.pl</A>)
        <LI> <A href="/jang/sandbox/cgi/examples/widget.htm">
                All widgets in a form</A>
                (<A target=new href=/jang/sandbox/showcode.asp?source=/jang/cgi-bin/widget.pl>
                widget.pl</A>)
        <LI> Variables in a <A href="/jang/sandbox/cgi/examples/testform.htm">simple form</A>
                (<A target=new href=/jang/sandbox/showcode.asp?source=/jang/cgi-bin/env.pl>
                env.pl</A>)
        <LI> Variables in a <A href="/jang/cgi-bin/tguest.pl"> guestbook</A>
                (<A target=new href=/jang/sandbox/showcode.asp?source=/jang/cgi-bin/tguest.pl>
                tguest.pl</A>)
                and
                <A href="/jang/cgi-bin/twidget.pl">"all widgets in a form"
                </A>
                (<A target=new href=/jang/sandbox/showcode.asp?source=/jang/cgi-bin/twidget.pl>
                twidget.pl</A>)
                <UL>
                This is a smart way of using env.pl for other existing forms;
                useful for variable dump and debugging.
                </UL>
        </UL>
	</ul>
<li>Advanced applications:
	<ul>
<LI> <A href="ip2name.htm">
        IP to domain name conversion </A>
                (<A target=new href=/jang/sandbox/showcode.asp?source=/jang/cgi-bin/ip2name.pl>
                ip2name.pl</A>)
<LI> <A href="name2ip.htm">
        Domain name to IP conversion </A>
                (<A target=new href=/jang/sandbox/showcode.asp?source=/jang/cgi-bin/name2ip.pl>
                name2ip.pl</A>)
<LI> <A href="lwpget.htm">
        Easiest way to get a web document</A>
                (<A target=new href=/jang/sandbox/showcode.asp?source=/jang/cgi-bin/lwpget.pl>
                lwpget.pl</A>)
<LI> <A href="u-agent.htm">
        User agent using the methods "GET" or "HEAD"</A>
                (<A target=new href=/jang/sandbox/showcode.asp?source=/jang/cgi-bin/u-agent.pl>
                u-agent.pl</A>)
<LI> <A href="extract.htm">
        Link extraction</A>
                (<A target=new href=/jang/sandbox/showcode.asp?source=/jang/cgi-bin/extract.pl>
                extract.pl</A>)
<LI> Guestbook (¶Q»«¯d¨¥Ã¯):
        <UL>
        <LI> A <A href="/jang/cgi-bin/tguest2.pl"> simple version </A>
                (<A target=new href=/jang/sandbox/showcode.asp?source=/jang/cgi-bin/guestbk_s.pl>
                guestbk_s.pl</A>)
        <LI> A <A href="/jang/guestbk/addguest.htm"> complete version </A>
                (<A target=new href=/jang/sandbox/showcode.asp?source=/jang/cgi-bin/guestbk.pl>
                guestbk.pl</A>)
        </UL>
<LI> <A href="auth.htm">Password verifier</A> via pop3 server
<LI> <A href="upload.htm">File upload</A>
	</ul>
<li>More examples/explanations can be found at my
	<a href="http://neural.cs.nthu.edu.tw/jang/sandbox/cgi">CGI sandbox</a>.
</ul>
</table>

</body>
</html>
