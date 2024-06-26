<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

class ChartJsController extends AbstractController
{
    #[Route('/')]
    public function index(ChartBuilderInterface $chartBuilder): Response
    {
        $chart = $chartBuilder->createChart(Chart::TYPE_LINE);

        $chart->setData([
                            'labels' => ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                            'datasets' => [
                                [
                                    'label' => 'My First dataset',
                                    'backgroundColor' => 'rgb(255, 99, 132)',
                                    'borderColor' => 'rgb(255, 99, 132)',
                                    'data' => [0, 10, 5, 2, 20, 30, 45],
                                ],
                            ],
                        ]);

        $chart->setOptions([
                               'scales' => [
                                   'y' => [
                                       'suggestedMin' => 0,
                                       'suggestedMax' => 100,
                                   ],
                               ],
                               'plugins' => [
                                   'zoom' => [
                                       'zoom' => [
                                           'wheel' => ['enabled' => true],
                                           'pinch' => ['enabled' => true],
                                           'mode' => 'xy',
                                       ],
                                   ],
                               ],
                           ]);

        return $this->render('chart_js/index.html.twig', [
            'chart' => $chart,
        ]);
    }
}
