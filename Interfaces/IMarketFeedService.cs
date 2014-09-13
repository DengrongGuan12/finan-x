using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace FinanX.Stocker.Infrastructure.Interfaces
{
    public interface IMarketFeedService
    {
        string GetStockName(string tickerSymbol);
        decimal GetPrice(string tickerSymbol);
        long GetVolume(string tickerSymbol);
        bool SymbolExists(string tickerSymbol);
    }
}
