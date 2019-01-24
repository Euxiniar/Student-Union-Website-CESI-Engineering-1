<tfoot>
                <tr>
                    <td>
                    <a href="./" class="btn btn-info" role="button"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Continuer les achats</a>
                        <button type="button" class="btn btn-danger" onclick="processEmptyCart(<?php echo $idcom?>)"> <i class="fa fa-trash" aria-hidden="true"></i> Vider le panier</button>
                    </td>

                    <td colspan="2" class="hidden-xs"></td>
                    <td class="hidden-xs text-center">Prix Total : <span id="cart-total-cost"><?php echo $datasEvent['Cout_total']?>€</span>
                    
                    </td>
                    <td>
                        <button type="button" class="btn btn-success">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> Commander
                        </button>
                    </td>
                </tr>
            </tfoot>

            </tbody>
</table>
</div>