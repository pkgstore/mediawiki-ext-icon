<?php

namespace MediaWiki\Extension\PkgStore;

use MWException;
use OutputPage, Parser, PPFrame, Skin;

/**
 * Class MW_EXT_Icon
 */
class MW_EXT_Icon
{
  /**
   * Register tag function.
   *
   * @param Parser $parser
   *
   * @return void
   * @throws MWException
   */
  public static function onParserFirstCallInit(Parser $parser): void
  {
    $parser->setFunctionHook('icon', [__CLASS__, 'onRenderTag'], Parser::SFH_OBJECT_ARGS);
  }

  /**
   * Render tag function.
   *
   * @param Parser $parser
   * @param PPFrame $frame
   * @param array $args
   *
   * @return string
   */
  public static function onRenderTag(Parser $parser, PPFrame $frame, array $args): string
  {
    // Get options parser.
    $getOption = MW_EXT_Kernel::extractOptions($frame, $args);

    // Argument: name.
    $getName = MW_EXT_Kernel::outClear($getOption['name'] ?? '' ?: '');
    $outName = $getName;

    // Argument: size.
    $getSize = MW_EXT_Kernel::outClear($getOption['size'] ?? '' ?: '');
    $outSize = empty($getSize) ? '' : 'font-size:' . $getOption['size'] . 'em;';

    // Argument: color.
    $getColor = MW_EXT_Kernel::outClear($getOption['color'] ?? '' ?: '');
    $outColor = empty($getColor) ? '' : 'color:' . $getOption['color'] . ';';

    // Argument: options.
    $getCustom = MW_EXT_Kernel::outClear($getOption['options'] ?? '' ?: '');
    $outCustom = $getCustom;

    // Out parser.
    return '<span class="' . $outName . ' ' . $outCustom . ' mw-icon navigation-not-searchable" style="' . $outSize . $outColor . '"></span>';
  }

  /**
   * Load resource function.
   *
   * @param OutputPage $out
   * @param Skin $skin
   *
   * @return void
   */
  public static function onBeforePageDisplay(OutputPage $out, Skin $skin): void
  {
    $out->addModuleStyles(['ext.mw.icon.styles']);
  }
}
