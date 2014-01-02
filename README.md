donation_api
============

A Donation API made for every day products, but mostly based around Minecraft.


Basic usage:

  require_once 'DonateAPI.php';
  $donationAPI = new DonateAPI("email@host", "Item");
  $donationAPI->generate_form("return path", username, paypal email, form action);
