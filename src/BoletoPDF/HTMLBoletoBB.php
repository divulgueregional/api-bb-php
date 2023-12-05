<?php
require_once 'CSS.php';

use Picqer\Barcode\BarcodeGeneratorHTML;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

$base64LogoBB = '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';
$generator = new BarcodeGeneratorHTML();
$barcode = $generator->getBarcode($dadosBoleto->textoCodigoBarrasTituloCobranca, BarcodeGeneratorHTML::TYPE_INTERLEAVED_2_5, 2, 70);
echo '<title>Boleto Banco do Brasil</title>';
?>

<?php if (!empty($dadosBoleto->qrCode) && !empty($dadosBoleto->qrCode->emv)) : ?>
    <table width="100%" style="border-collapse: collapse; font-family: Arial, Helvetica, sans-serif; padding-top: 0;margin-bottom: 0;padding-bottom: 0; height: 70px; margin-top:10px; margin-bottom:10px">
        <tr>

            <td style="width: 80px;vertical-align: middle;">
                <img width="70" height="70" src="data:image/png;base64, <?= base64_encode(QrCode::size(50)->generate($dadosBoleto->qrCode->emv)->toHtml()) ?>">
            </td>
            <td style="vertical-align: middle;">
                Pague sua cobrança via Pix, o recebimento é
                instantâneo.<br>
                <span style="font-size:10pt">Leia o QR Code no aplicativo do seu banco.</span>
            </td>
        </tr>
    </table>
<?php endif; ?>
<?php foreach (($dadosBoleto->gerarDuasVias ? [1, 2] : [1]) as $viaAtual) { ?>
    <div class="boleto">

        <!--Bloco A-->
        <table>
            <tr>
                <td style="width: 120px" class="borda_direta">
                    <img class="img_logo_bb_top" src="data:image/png;base64,<?= $base64LogoBB ?>">

                </td>
                <td style="width: 50px" class="borda_direta alinhar_centro azul">
                    <b>001-9</b>
                </td>
                <td class="alinhar_direta azul">
                    <b><?= ($dadosBoleto->codigoBarrasDigitavel ?? '') ?></b>
                </td>
            </tr>
        </table>
        <!--Fim Bloco A-->



        <!--Bloco B-->
        <table class="table_bloco">
            <tr>
                <td style="width: 70%">
                    <div class="div_campo_info altura_fixa_28">
                        <div class="titulo_campo azul">Local de pagamento</div>
                        <div class="info_campo">Pagável em qualquer Banco até o vencimento</div>
                    </div>
                </td>
                <td style="width: 30%;" class="fundo_amarelo_claro">
                    <div class="div_campo_info altura_fixa_28">
                        <div class="titulo_campo azul">Vencimento</div>
                        <div class="info_campo"><?= ($dadosBoleto->dataVencimentoTituloCobranca ?? '') ?></div>
                    </div>
                </td>

            </tr>
        </table>
        <!--Fim Bloco B-->



        <!--Bloco C-->
        <table class="table_bloco">
            <tr>
                <td style="width: 70%">
                    <div class="div_campo_info altura_fixa_28">
                        <div class="titulo_campo azul">Cedente</div>
                        <div class="info_campo"><?= ($dadosBoleto->nomeSacadorAvalistaTitulo ?? '') ?></div>
                    </div>
                </td>
                <td style="width: 30%;">
                    <div class="div_campo_info altura_fixa_28">
                        <div class="titulo_campo azul">Agência/Código do cedente </div>
                        <div class="info_campo"><?= ($dadosBoleto->agencia ?? '') ?>/<?= ($dadosBoleto->codigoCedente ?? '') ?></div>
                    </div>
                </td>
            </tr>
        </table>
        <!--Fim Bloco C-->


        <!--Bloco D-->
        <table class="table_bloco">
            <tr>
                <td style="width: 15%">
                    <div class="div_campo_info altura_fixa_28">
                        <div class="titulo_campo azul">Data do documento</div>
                        <div class="info_campo"><?= ($dadosBoleto->dataEmissaoTituloCobranca ?? '') ?></div>
                    </div>
                </td>
                <td style="width: 15%;">
                    <div class="div_campo_info altura_fixa_28">
                        <div class="titulo_campo azul">Nº do documento </div>
                        <div class="info_campo"><?= ($dadosBoleto->numeroTituloCedenteCobranca ?? '') ?></div>
                    </div>
                </td>

                <td style="width: 12%;">
                    <div class="div_campo_info altura_fixa_28">
                        <div class="titulo_campo azul">Espécie DOC </div>
                        <div class="info_campo">DM</div>
                    </div>
                </td>

                <td style="width: 9.36%;">
                    <div class="div_campo_info altura_fixa_28">
                        <div class="titulo_campo azul">Aceite </div>
                        <div class="info_campo"><?= ($dadosBoleto->codigoAceiteTituloCobranca ?? '') ?></div>
                    </div>
                </td>

                <td style="width: 13.74%;">
                    <div class="div_campo_info altura_fixa_28">
                        <div class="titulo_campo azul">Data process. </div>
                        <div class="info_campo"><?= ($dadosBoleto->dataRegistroTituloCobranca ?? '') ?></div>
                    </div>
                </td>
                <td style="width: 27.9%;">
                    <div class="div_campo_info altura_fixa_28">
                        <div class="titulo_campo azul">Nosso número </div>
                        <div class="info_campo"><?= ($dadosBoleto->nossoNumero ?? '') ?></div>
                    </div>
                </td>
            </tr>
        </table>
        <!--Fim Bloco D-->






        <!--Bloco E-->
        <table class="table_bloco">
            <tr>
                <td style="width: 16.1%" class="fundo_amarelo_claro">
                    <div class="div_campo_info altura_fixa_28">
                        <div class="titulo_campo azul">Uso do Banco</div>
                        <div class="info_campo"> </div>
                    </div>
                </td>
                <td style="width: 16.15%;">
                    <div class="div_campo_info altura_fixa_28">
                        <div class="titulo_campo azul">Carteira</div>
                        <div class="info_campo"><?= ($dadosBoleto->numeroCarteiraCobranca ?? '') ?></div>
                    </div>
                </td>

                <td style="width: 12.9%;">
                    <div class="div_campo_info altura_fixa_28">
                        <div class="titulo_campo azul">Espécie</div>
                        <div class="info_campo">R$</div>
                    </div>
                </td>

                <td style="width: 7%;">
                    <div class="div_campo_info altura_fixa_28">
                        <div class="titulo_campo azul">Quantidade</div>
                        <div class="info_campo"> </div>
                    </div>
                </td>

                <td style="width: 14.758%;">
                    <div class="div_campo_info altura_fixa_28">
                        <div class="titulo_campo azul">Valor</div>
                        <div class="info_campo"></div>
                    </div>
                </td>
                <td>
                    <div class="div_campo_info altura_fixa_28">
                        <div class="titulo_campo azul">(=) Valor do documento</div>
                        <div class="info_campo">R$ <?= number_format($dadosBoleto->valorAtualTituloCobranca ?? '0', 2, ',', '.') ?></div>
                    </div>
                </td>
            </tr>
        </table>
        <!--Fim Bloco E-->


        <table style="border-collapse:unset; border: none;">
            <tr>
                <td class="alinhar_top" style="width: 69.87%; border-bottom: 1px black solid;">

                    <!--Instruções do boleto-->
                    <table class="table_bloco" style="border-collapse:unset; border: none;">
                        <tr class="alinhar_top">
                            <td>
                                <div class="titulo_campo azul">Instruções</div>
                                <div style="height: 93px;overflow: hidden;" class="info_campo">
                                    Pagável em qualquer banco até o vencimento
                                    <br>
                                    <?= $dadosBoleto->textoMensagemBloquetoTitulo ?>

                                    <?php
                                    if (in_array($dadosBoleto->codigoTipoMulta, [1, 2])) {
                                        $dataMulta = str_replace('.', '/', $dadosBoleto->dataMultaTitulo);
                                        $msgMulta = '';
                                        if ($dadosBoleto->codigoTipoMulta == 1 && $dadosBoleto->valorMultaTituloCobranca > 0) {
                                            $multa = number_format($dadosBoleto->valorMultaTituloCobranca, 2, ',', '.');
                                            $msgMulta = "Em $dataMulta, multa de R$ $multa.";
                                        }

                                        if ($dadosBoleto->codigoTipoMulta == 2 && $dadosBoleto->percentualMultaTitulo > 0) {
                                            $multa = number_format(($dadosBoleto->valorAtualTituloCobranca * $dadosBoleto->percentualMultaTitulo) / 100, 2, ',', '.');
                                            $msgMulta = "Em $dataMulta, multa de $dadosBoleto->percentualMultaTitulo%, R$ $multa.";
                                        }
                                    ?>
                                        <?= $msgMulta ?><br>

                                    <?php } ?>


                                    <?php
                                    if (in_array($dadosBoleto->codigoTipoJuroMora, [1, 2])) {

                                        $dataMora = str_replace('.', '/', $dadosBoleto->dataMultaTitulo);
                                        $msgMora = '';
                                        if ($dadosBoleto->codigoTipoJuroMora == 1 && $dadosBoleto->valorJuroMoraTitulo > 0) {
                                            $mora = number_format($dadosBoleto->valorJuroMoraTitulo, 2, ',', '.');
                                            $msgMora = "A partir de $dataMora, mora diária de R$ $mora.";
                                        }

                                        if ($dadosBoleto->codigoTipoJuroMora == 2 && $dadosBoleto->percentualJuroMoraTitulo > 0) {
                                            $mora = number_format(($dadosBoleto->valorAtualTituloCobranca * $dadosBoleto->percentualJuroMoraTitulo) / 100, 2, ',', '.');
                                            $msgMora = "A partir de $dataMora, mora mensal de R$ $mora.";
                                        }
                                    ?>
                                        <?= $msgMora ?><br>

                                    <?php } ?>

                                </div>
                            </td>
                        </tr>
                    </table>
                    <!-- Fim Instruções do boleto-->

                </td>
                <td class="alinhar_top" style="border-bottom: 1px black solid;">

                    <!--Bloco F-->
                    <table class="table_bloco border_collapse">
                        <tr>
                            <td>
                                <div class="div_campo_info altura_fixa_28">
                                    <div class="titulo_campo azul">(-) Desconto/Abatimento</div>
                                    <div class="info_campo"> </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <!--Fim Bloco F-->


                    <table class="table_bloco border_collapse">
                        <tr>
                            <td>
                                <div class="div_campo_info altura_fixa_28">
                                    <div class="titulo_campo azul"> </div>
                                    <div class="info_campo"> </div>
                                </div>
                            </td>
                        </tr>
                    </table>


                    <!--Bloco G-->
                    <table class="table_bloco border_collapse">
                        <tr>
                            <td>
                                <div class="div_campo_info altura_fixa_28">
                                    <div class="titulo_campo azul">(+) Juros/Multa</div>
                                    <div class="info_campo"></div>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <!--Fim Bloco G-->

                    <table class="table_bloco border_collapse">
                        <tr>
                            <td>
                                <div class="div_campo_info altura_fixa_28">
                                    <div class="titulo_campo azul"> </div>
                                    <div class="info_campo"> </div>
                                </div>
                            </td>
                        </tr>
                    </table>


                    <!--Bloco H-->
                    <table class="table_bloco border_collapse" style="border: none;">
                        <tr>
                            <td class="fundo_amarelo_claro">
                                <div class="div_campo_info altura_fixa_28">
                                    <div class="titulo_campo azul">(=) Valor cobrado</div>
                                    <div class="info_campo">R$ <?= number_format($dadosBoleto->valorAtualTituloCobranca ?? '0', 2, ',', '.') ?></div>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <!--Fim Bloco H-->

                </td>
            </tr>
        </table>


        <!--Bloco I-->
        <table class="table_bloco">
            <tr>
                <td style="width: 100%">
                    <div class="div_campo_info">
                        <div class="titulo_campo azul">Sacado</div>
                        <div class="info_campo"><?= $dadosBoleto->nomeSacadoCobranca ?></div>
                        <div class="info_campo"><?= $dadosBoleto->textoEnderecoSacadoCobranca ?></div>
                        <div class="info_campo"><?= $dadosBoleto->nomeMunicipioSacadoCobranca . ' - ' . $dadosBoleto->siglaUnidadeFederacaoSacadoCobranca . ' - ' . $dadosBoleto->numeroCepSacadoCobranca ?></div>
                        <div class="titulo_campo azul">Sacador/Avalista</div>
                    </div>
                </td>

            </tr>
        </table>
        <!--Fim Bloco I-->


        <!--Bloco J-->
        <div class="titulo_campo azul alinhar_direta">Autenticação mecânica</div>
        <?php if (!$dadosBoleto->gerarDuasVias || $viaAtual == 2) { ?>
            <div style="position: absolute; bottom: 0">
                <?= $barcode ?>
            </div>
        <?php } ?>
        <!--Fim Bloco J-->

        <?php if ($dadosBoleto->gerarDuasVias && $viaAtual == 1) { ?>
            <br>
            <br>
            <div class="titulo_campo azul alinhar_direta">Corte na linha pontilhada</div>
            <div style="border-bottom:1px dashed; height: 1px"></div>
            <br>
            <br>
        <?php } ?>
    </div>
<?php
}
