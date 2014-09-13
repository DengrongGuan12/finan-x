using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using FinanX.Stocker.Infrastructure.Models;

namespace StockTraderRI.Infrastructure.Interfaces
{
    public interface ITradePositionService
    {
        AccountPosition GetTradePosition(string tikerSymbol);
        List<AccountPosition> GetTradePositions();
        event EventHandler<AccountPositionModelEventArgs> Updated;
    }
}