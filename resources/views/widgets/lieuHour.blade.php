<!--lieuHour widget partial view-->

<ul class="info list--unstyled">
    <li>Lieu Hours: {{-- $entitlement->staff->holiday_entitlement --}} days</li>
    <li>Total Booked: {{-- $total --}} days</li>
    <li>Hours remaining: {{-- $entitlement->staff->holiday_entitlement - $total --}} days</li>
</ul>