<ul>
    <li><em><strong>"StrictCookie"</strong> (<code>SameSite=Strict</code>) should never sent on cross-site requests.</em></li>
    <li><em><strong>"LaxCookie"</strong> (<code>SameSite=Lax</code>) should only be sent on cross-site <code>GET</code> requests.</em></li>
    <li><em><strong>"SecureNoneCookie"</strong> (<code>SameSite=None; Secure</code>) should always be sent on cross-site requests.</em></li>
    <li><em><strong>"NoneCookie"</strong> (<code>SameSite=None</code>) is invalid and should never rejected by the browser and never sent. (Note, your browser may not block these cookies yet.)</em></li>
    <li><em><strong>"DefaultCookie"</strong> (No <code>SameSite</code> attribute) will always be sent on cross-site reqursts until your browser rolls out <code>SameSite=Lax</code> by default.</em></li>
</ul>
