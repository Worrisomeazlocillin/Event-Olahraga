<!-- app/Views/registrations/index.php -->
<h2>Register for <?= $event['name'] ?></h2>
<form action="/registrations/store" method="post">
    <input type="hidden" name="event_id" value="<?= $event['id'] ?>">
    <label>Name</label>
    <input type="text" name="name">
    <label>Email</label>
    <input type="email" name="email">
    <label>Phone</label>
    <input type="text" name="phone">
    <button type="submit">Register</button>
</form>
