<?php
function generateFacebookShareUrl($productName, $productId) {
    $productNameEncoded = urlencode($productName);
    $productUrl = urlencode('https://elesemes.com/product.php?id=' . $productId);
    $shareUrl = 'https://www.facebook.com/sharer/sharer.php?u=' . $productUrl. '&quote=' . $productNameEncoded;
    return $shareUrl;
}

function generateTwitterShareUrl($productName, $productId) {
    $productUrl = urlencode('https://elesemes.com/product.php?id=' . $productId);
    $productNameEncoded = urlencode($productName);
    $shareUrl = 'https://twitter.com/intent/tweet?url=' . $productUrl . '&text=' . $productNameEncoded;
    return $shareUrl;
}

function generateWhatsAppMessageUrl($productName, $productId) {
    $productNameEncoded = urlencode($productName);
    $productUrl = urlencode('https://elesemes.com/product.php?id=' . $productId);
    $shareUrl = 'https://web.whatsapp.com/send?text=' . $productNameEncoded . '%20' . $productUrl;
    return $shareUrl;
}

?>
